<div class="container-lg">
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
          <a class="btn d-none d-sm-inline-block" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasBottom">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <?php icon_filter() ?>
            Filter
          </a>
          <a class="btn d-sm-none btn-icon" data-bs-toggle="offcanvas" href="#offcanvasBottom" role="button" aria-controls="offcanvasBottom">
            <?php icon_filter() ?>
          </a>
          <a href="<?php echo URLROOT ?>/app/views/transaction/?view=returnbooks" class="btn d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <?php icon_search() ?>
            Search By Transaction ID
          </a>
          <a href="<?php echo URLROOT ?>/app/views/transaction/?view=returnbooks" class="btn d-sm-none btn-icon" aria-label="Search by Transaction">
            <?php icon_search() ?>
          </a>
          <a href="<?php echo URLROOT ?>/app/views/transaction" class="btn d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Add New Transaction
          </a>
          <a href="<?php echo URLROOT ?>/app/views/transaction" class="btn d-sm-none btn-icon" aria-label="Add new Transaction">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-lg"> 
    <div class="card"> 
      <div class="table-responsive">
        <table id="table-default" class="table card-table table-vcenter text-nowrap datatable"> 
          <thead class="thead-light">
            <tr>
              <th class="w-1">QR Code</th> 
              <th>Student</th>
              <th class="w-1">Date</th>
              <th class="w-1">Status</th>
              <th class="w-1">Handle</th>
            </tr>
          </thead>
          <tbody> 
            <?php foreach ($transactions as $key =>  $item): ?>
              <tr>
                <td id="row_<?php echo $key+1; ?>" class="img-fluid"></td>
                <td>
                  <p class="mb-0">
                    <span class="fw-bold">NAME: </span>
                    <?php echo $student->student_info($item->student_id)->last_name, ", ", $student->student_info($item->student_id)->first_name, " ", substr($student->student_info($item->student_id)->middle_name, 0, 1),"."; ?>
                  </p>
                  <p class="mb-0">
                    <span>Transaction Code: </span><?php echo $item->id ?>
                  </p> 
                </td> 
                <td>
                  <p class="mb-0"><span class="fw-bold">Added : </span><?php echo display_date($item->date_added, "Y-m-d"); ?></p>
                  <p class="mb-0"><span class="fw-bold">Returned : </span><?php echo display_date($item->date_returned, "Y-m-d"); ?></p> 
                </td>
                <td>
                  <?php echo ($item->status == 'Returned') ? '<span class="badge bg-green">Returned</span>' : '<span class="badge bg-red">Borrowed</span>' ;?>   
                </td>
                <td>
                  <a href="./?view=borrowDetails&borrow_id=<?php echo $item->id ?>" class="btn p-2"><?php icon_view(); ?> <span class="d-none d-lg-block ms-2">View Details</span></a>
                  <!-- <a href="./?view=edit&id=<?php echo $item->id ?>" class="btn"><i class="fa fa-edit me-1"></i> Edit</a> -->
                  <!-- <form method="POST" class="d-inline validate" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=update_status'?>">
                    <?php csrf(); ?>
                    <input type="hidden" name="id" value="<?php echo $item->id ?>">
                    <button type="submit" onclick="handleClick()" class="btn btn-pink p-2"><?php icon_info(); ?> <span class="d-none d-lg-block ms-2"><?php echo $item->status ?></span></button>
                  </form> -->
                </td>
              </tr> 
            <?php endforeach ?> 
          </tbody>
        </table>
      </div>  
    </div>
  </div>
</div>
<div class="offcanvas offcanvas-bottom h-auto" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel"><?php icon_filter() ?> Filter By Status</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    <div class="mb-3">
      <div class="row g-2 align-items-center"> 
        <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
          <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows&status=returned" class="btn btn-success w-100">
            Returned
          </a>
        </div>
        <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
          <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows&status=borrowed" class="btn btn-danger w-100">
            Borrowed
          </a>
        </div>
        <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
          <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows" class="btn w-100">
            All Transactions
          </a>
        </div>  
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
<script> 
  function generate_qrcode(text, el) {
    const qrCode = new QRious({
      value: text,
      size: 300
    });
    const qrCanvas = document.createElement('canvas'); 
    qrCanvas.width = 300;
    qrCanvas.height = 300;
    qrCanvas.getContext('2d').drawImage(qrCode.canvas, 0, 0);  
    // const label = document.createElement('p');
    // label.innerHTML = "Click me";
    // label.classList.add("mb-0"); 
    const img = document.createElement('img');
    img.src = qrCanvas.toDataURL();
    img.classList.add("img_qr"); 
    el.appendChild(img);
    // el.appendChild(label);
  }

<?php foreach ($transactions as $key => $data): ?> 
  generate_qrcode('<?php echo $data->id ?>', document.getElementById('row_<?php echo $key+1; ?>')); 
<?php endforeach ?>

</script>
<script>
  $(document).ready(function() {
    $('.img_qr').on('click', function(){
      let img = $(this); 
      popQr(img.get(0).outerHTML);
    })
  });
</script> 