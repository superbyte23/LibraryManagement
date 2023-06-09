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
          <?php if ($_SESSION['usertype'] != 'student'): ?>
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
          <?php endif ?>
          
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
    <div class="mb-2"> 
      <input type="search" id="search-bar" name="search-bar" placeholder="Search Names" class="form-control">
    </div>
    <div class="card"> 
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php foreach ($transactions as $key =>  $item): ?> 
        <div class="accordion-item"> 
          <div class="p-3 text-decoration-none row align-items-center">
            <div class="col-2 col-lg-1" id="row_<?php echo $key+1; ?>" ></div>
            <div class="col">
             <h4 class="mb-0" id="name">NAME: <?php echo $student->student_info($item->student_id)->last_name, ", ", $student->student_info($item->student_id)->first_name, " ", substr($student->student_info($item->student_id)->middle_name, 0, 1),"."; ?></h3>
             <h4>Transaction Code: <?php echo $item->id ?></h4>
             </div>
             <div class="col-auto">
               <?php echo ($item->status == 'Returned') ? '<span class="badge bg-green">Returned</span>' : '<span class="badge bg-red">Borrowed</span>' ;?>
             </div>
             <div class="col-auto d-none d-lg-block">
               <p class="mb-0"><span class="fw-bold">Borrowed : </span><?php echo display_date($item->date_added, "Y-m-d"); ?></p>
                <p class="mb-0"><span class="fw-bold">Returned : </span><?php echo display_date($item->date_returned, "Y-m-d"); ?></p> 
             </div> 
             <div class="col-auto d-none d-lg-block">
               <a href="./?view=borrowDetails&borrow_id=<?php echo $item->id ?>" class="btn p-2"><?php icon_view(); ?> <span class="ms-2">View Details</span></a>
                  <!-- <a href="./?view=edit&id=<?php echo $item->id ?>" class="btn"><i class="fa fa-edit me-1"></i> Edit</a> -->
                  <!-- <form method="POST" class="d-inline validate" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=update_status'?>">
                    <?php csrf(); ?>
                    <input type="hidden" name="id" value="<?php echo $item->id ?>">
                    <button type="submit" onclick="handleClick()" class="btn btn-pink p-2"><?php icon_info(); ?> <span class="d-none d-lg-block ms-2"><?php echo $item->status ?></span></button>
                  </form> -->
             </div>
             <div class="col-auto">
               <a class="accordion-button collapsed btn p-0" data-bs-toggle="collapse" data-bs-target="#flush<?php echo $key ?>" aria-expanded="false" aria-controls="flush-collapseOne"></a> 
             </div>
          </div> 
          <div id="flush<?php echo $key ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <div class="row align-items-center">
                <div class="col d-lg-none d-sm-block">
                   <p class="mb-0"><span class="fw-bold">Added : </span><?php echo display_date($item->date_added, "Y-m-d"); ?></p>
                    <p class="mb-0"><span class="fw-bold">Returned : </span><?php echo display_date($item->date_returned, "Y-m-d"); ?></p> 
                 </div>
                 <!-- <div class="col-auto d-lg-none d-sm-block">
                   <?php echo ($item->status == 'Returned') ? '<span class="badge bg-green">Returned</span>' : '<span class="badge bg-red">Borrowed</span>' ;?>
                 </div> -->
                 <div class="col-auto d-lg-none d-sm-block">
                   <a href="./?view=borrowDetails&borrow_id=<?php echo $item->id ?>" class="btn p-2"><?php icon_view(); ?> <span class="ms-2">View Details</span></a>
                      <!-- <a href="./?view=edit&id=<?php echo $item->id ?>" class="btn"><i class="fa fa-edit me-1"></i> Edit</a> -->
                      <!-- <form method="POST" class="d-inline validate" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=update_status'?>">
                        <?php csrf(); ?>
                        <input type="hidden" name="id" value="<?php echo $item->id ?>">
                        <button type="submit" onclick="handleClick()" class="btn btn-pink p-2"><?php icon_info(); ?> <span class="d-none d-lg-block ms-2"><?php echo $item->status ?></span></button>
                      </form> -->
                 </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?> 
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
    $('#search-bar').on('keyup', function() {
      var value = $(this).val().toLowerCase(); // Get the search bar value

      $('.accordion-item').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });

    $('.img_qr').on('click', function(){
      let img = $(this); 
      popQr(img.get(0).outerHTML);
    })
  });
</script> 