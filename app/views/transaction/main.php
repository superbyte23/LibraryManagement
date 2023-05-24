<div class="container">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <label class="form-label">Search Student</label>
        <input type="text" name="" class="form-control">
      </div>
    </div>
  </div>
</div>
<div class="page-body">
    <div class="container">
    <div class="row">
      <div class="col-12">
        <div id="video-frame" class="d-none">
          <video id="camera-stream" class="w-100" autoplay></video>
          <canvas id="qr-canvas" style="height: 0"></canvas>
        </div>  
        <div id="qr-result" class="mb-3"></div>
        <div class="d-flex"> 
        <button id="toggleScanbtn" class="btn w-100 mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-qrcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M7 17l0 .01"></path><path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M7 7l0 .01"></path><path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path><path d="M17 7l0 .01"></path><path d="M14 14l3 0"></path><path d="M20 14l0 .01"></path><path d="M14 14l0 3"></path><path d="M14 20l3 0"></path><path d="M17 17l3 0"></path><path d="M20 17l0 3"></path>
            </svg><span>Scan QR Code</span></button> 
        </div> 
      </div>
    </div> 
    
    <div class="card"> 
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable"> 
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Author</th>
              <th>Publisher</th>
              <th>Year</th> 
              <th class="w-1">Handle</th>
            </tr>
          </thead>
          <tbody> 
            <?php foreach ($books as $key =>  $book): ?>

              <tr>
                <th><?php echo $key+1; ?></th>
                <td><?php echo $book->title ?></td>
                <td><?php echo $book->author ?></td>
                <td><?php echo $book->publisher ?></td>
                <td><?php echo $book->year_published ?></td> 
                <td>
                  <a href="./?view=edit&id=<?php echo $book->id ?>" class="btn"><i class="fa fa-edit me-1"></i> View Inventory</a>
                  <a href="./?view=edit&id=<?php echo $book->id ?>" class="btn"><i class="fa fa-edit me-1"></i> Edit</a>
                  <form  method="POST" class="d-inline validate" action="<?php echo URLROOT.'/app/controller/usercontroller.php?action=destroy'?>">
                    <?php csrf(); ?>
                    <input type="hidden" name="id" value="<?php echo $book->id ?>">
                    <button type="submit" class="btn btn-pink">Remove User</button>
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

<script src="https://unpkg.com/@zxing/library@0.17.1"></script>
<script>
  var video_frame = document.getElementById('video-frame');
  var video = document.getElementById('camera-stream');
  var canvas = document.getElementById('qr-canvas');
  var context = canvas.getContext('2d');
  var reader = new ZXing.BrowserMultiFormatReader();
  var stopFlag = false;
  var qrcodeResult = null;
  const toggleScanbtn = document.getElementById('toggleScanbtn');
  toggleScanbtn.addEventListener('click', () => {
    if(stopFlag == false){
      video_frame.classList.toggle("d-none");
      toggleScanbtn.querySelector('span').innerHTML = "Stop Scanning"; 
      openScanner();
      stopFlag = true;
    }else{
      video_frame.classList.toggle("d-none");
      toggleScanbtn.querySelector('span').innerHTML = "Scan QR Code";
      stopScanner(); 
      stopFlag = false;
    }
  });
  function openScanner(){  
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } })
    .then(stream => { 
      video.srcObject = stream; 
      reader.decodeFromVideoDevice(null, 'camera-stream', (result, error) => {
        if (result) {
          console.log(`QR code detected: ${result.getText()}`); 
          alert(qrcodeResult)
          get_book_info(result.getText());
        }
        if (error) {
          // console.error(error);
        }
      });
    })
    .catch(err => console.error(err));
  } 
  function stopScanner(){
    video.srcObject.getTracks().forEach(track => {
      track.stop();
    }); 
  }

  // get student info

  function get_book_info(qrcode){
    fetch('https://api.example.com/data', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(postData)
    })
      .then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error(error));
  }

  // get book info

  function get_book_info(qrcode){
    fetch('https://api.example.com/data', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(postData)
    })
      .then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error(error));
  }

  // call this function after scanning barcode.
  function process_borrow(postData){
     
    fetch('https://api.example.com/data', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(postData)
    })
      .then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error(error));
  }
  
</script> 
