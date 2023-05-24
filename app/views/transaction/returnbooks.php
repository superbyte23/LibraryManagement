<div class="container">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h2 class="page-title">
        <?php echo $pagetitle ? $pagetitle : 'SET TITLE'?>
        </h2>
      </div>
      <!-- Page title actions -->
      <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
          <a href="<?php echo URLROOT ?>/app/views/transaction?view=borrows" class="btn d-none d-sm-inline-block"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M13 14l-4 -4l4 -4"></path>
             <path d="M8 14l-4 -4l4 -4"></path>
             <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
          </svg>
            Back to Transactions
          </a>
          <a href="<?php echo URLROOT ?>/app/views/transaction?view=borrows" class="btn d-sm-none btn-icon" aria-label="Create new report">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M13 14l-4 -4l4 -4"></path>
               <path d="M8 14l-4 -4l4 -4"></path>
               <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div> 
<div class="page-body">
  <div class="container"> 
    <div class="card">
      <div class="card-body">   
        <form id="find_transaction_form">
          <div class="mb-3">
            <label class="form-label">Enter Transaction Code</label>
            <input type="number" name="input_transaction_id" class="form-control" id="input_transaction_id">
          </div> 
        </form>
        <div class="mb-3">
          <label class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="toggle_qrscanner">
            <span class="form-check-label">Use QR Scanner</span>
          </label>
        </div> 
        <div class="mb-3 d-flex justify-content-center">
          <div style="width: 500px" id="reader"></div>
        </div>
        <div class="mb-3 py-5 text-center d-none" id="placeholder">
          <div>
            <div class="avatar avatar-rounded avatar-lg placeholder mb-3"></div>
          </div>
          <div class="mt w-75 mx-auto">
            <div class="placeholder col-9 mb-3"></div>
            <div class="placeholder placeholder-xs col-10"></div>
          </div>
        </div> 
      </div> 
    </div>
  </div>
</div> 
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
const html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 }); 
const toggle_qrscanner = document.getElementById('toggle_qrscanner');
const find_transaction_form = document.getElementById('find_transaction_form');
const input_transaction_id = document.getElementById('input_transaction_id');

toggle_qrscanner.addEventListener('change', function(){
  if (this.checked) { 
    console.log('QR Scanner is ON');
    html5QrcodeScanner.render(onScanSuccess);
    input_transaction_id.disabled = true;
  } else { 
    console.log('QR Scanner is OFF');
    html5QrcodeScanner.clear();
    input_transaction_id.disabled = false;
  }
});

find_transaction_form.addEventListener('submit', function(){
  event.preventDefault();
  let id = input_transaction_id.value;
  find_transaction(id);
})


function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
  html5QrcodeScanner.clear();
  find_transaction(decodedText);
} 

function find_transaction(code){ 
  document.getElementById('placeholder').classList.remove("d-none");
  html5QrcodeScanner.clear();
  $.ajax({
    url: '<?php echo URLROOT.'/app/controller/ajax_controller.php?action=find_transaction'; ?>',
    type: 'POST',
    dataType: 'json',
    data: {code: code},
  })
  .done(function(res) {
    document.getElementById('placeholder').classList.add("d-none");
    console.log(res);
    if(res.found == true){
      find_trans_alert('Transaction found. Redirecting to return process form', 'green', 'Success!', `<?php echo URLROOT; ?>/app/views/transaction/?view=borrowDetails&borrow_id=${res[0].id}` );
      if (toggle_qrscanner.checked) {
        html5QrcodeScanner.render(onScanSuccess); 
      } 
    }else{
      find_trans_alert('Transaction not found. please try again', 'red', 'Error!');
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  

}
</script>