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
          <a href="#" data-bs-toggle="modal" data-bs-target="#add_bulk_isbn" class="btn d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Add ISBN
          </a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#add_bulk_isbn" class="btn d-sm-none btn-icon" aria-label="Create new report">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
          </a>
          <a href="<?php echo URLROOT ?>/app/views/books" class="btn d-none d-sm-inline-block"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M13 14l-4 -4l4 -4"></path>
             <path d="M8 14l-4 -4l4 -4"></path>
             <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
          </svg>
            Back
          </a>
          <a href="<?php echo URLROOT ?>/app/views/books" class="btn d-sm-none btn-icon" aria-label="Create new report">
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
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable"> 
          <thead class="thead-light">
            <tr>
              <th>#</th> 
              <th>ISBN</th> 
              <th>QR Code</th> 
              <th class="w-1">Handle</th>
            </tr>
          </thead>
          <tbody> 
            <?php foreach ($data as $key =>  $isbn): ?>

              <tr>
                <td class="small"><?php echo $key+1; ?></td> 
                <td>
                  <p class="mb-0 fw-bold"><?php echo $isbn->isbn ?></p>
                  <small><span class="fw-bold">Location </span>: <?php echo $isbn->location ?></small>
                  </td> 
                <td id="row_<?php echo $key+1; ?>"></td>
                <td> 
                  <a href="./?view=edit&id=<?php echo $isbn->id ?>" class="btn p-2"><?php icon_edit(); ?> <span class="d-none d-lg-block ms-2">Edit</span></a>
                  <form  method="POST" class="d-inline validate" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=delete_isbn'?>">
                    <?php csrf(); ?>
                    <input type="hidden" name="id" value="<?php echo $isbn->id ?>">
                    <input type="hidden" name="book_id" value="<?php echo $_GET['id'] ?>">
                    <button type="submit" class="btn btn-pink p-2"><?php icon_trash(); ?> <span class="d-none d-lg-block ms-2">Remove</span></button>
                  </form>
                </td>
              </tr> 
            <?php endforeach ?> 
          </tbody>
        </table>
      </div>  
    </div>
  </div>
</div>
<div class="modal modal-blur fade" id="add_bulk_isbn" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=add_isbn'; ?>">

          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
          <div id="form">
          <label class="form-label">Enter ISBN</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="isbn[]" placeholder="ISBN : xx ..." spellcheck="false" data-ms-editor="true" required>
            <button class="btn btn_delete" onclick="remove_field(this)" type="button"><?php echo icon_trash() ?></button>
          </div>
            
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" id="btn-plus" class="btn btn-outline-warning"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
               <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
               <path d="M9 12l6 0"></path>
               <path d="M12 9l0 6"></path>
            </svg></button>
            <button type="submit" class="btn btn-outline-green">Submit Form</button>
          </div> 
        </form> 
      </div> 
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
<script> 
  function generate_qrcode(text, el) {
    const qrCode = new QRious({
      value: text,
      size: 120
    });
    const qrCanvas = document.createElement('canvas');

    qrCanvas.width = 120;
    qrCanvas.height = 120;
    qrCanvas.getContext('2d').drawImage(qrCode.canvas, 0, 0); 

    const img = document.createElement('img');
    img.src = qrCanvas.toDataURL();

    el.appendChild(img);
  }
</script>
<script> 
  <?php foreach ($data as $key => $isbn): ?> 
    generate_qrcode('<?php echo $isbn->isbn ?>', document.getElementById('row_<?php echo $key+1; ?>')); 
  <?php endforeach ?>
</script>

<script>
  
  let btn_plus = document.querySelector('#btn-plus');
  btn_plus.addEventListener('click', () => {
    var form = document.getElementById('form');
    var div = document.createElement('div'); 
    div.innerHTML = `<div class="input-group mb-3">
            <input type="text" class="form-control" name="isbn[]" placeholder="ISBN : xx ..." spellcheck="false" data-ms-editor="true" required>
            <button class="btn btn_delete" onclick="remove_field(this)" type="button"><?php echo icon_trash() ?></button>
          </div>`; 
    form.appendChild(div);
  });
  function remove_field(element){
    element.closest('.input-group').remove()
  } 
  
</script>