<style>#video-container{line-height:0}#video-container.example-style-1 .scan-region-highlight-svg,#video-container.example-style-1 .code-outline-highlight{stroke:#64a2f3 !important}#video-container.example-style-2{position:relative;overflow:hidden}#video-container.example-style-2 .scan-region-highlight{border-radius:30px;outline:rgba(0,0,0,.25) solid 50vmax}#video-container.example-style-2 .scan-region-highlight-svg{display:none}#video-container.example-style-2 .code-outline-highlight{stroke:rgba(255,255,255,.5) !important;stroke-width:15 !important;stroke-dasharray:none !important}#flash-toggle{display:none}hr{margin-top:32px}input[type=file]{display:block;margin-bottom:16px}</style>
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
          <a href="<?php echo URLROOT ?>/app/views/transaction" class="btn d-none d-sm-inline-block"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M13 14l-4 -4l4 -4"></path>
             <path d="M8 14l-4 -4l4 -4"></path>
             <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
          </svg>
            Back
          </a>
          <a href="<?php echo URLROOT ?>/app/views/transaction" class="btn d-sm-none btn-icon" aria-label="Create new report">
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
    <h3>NAME : <span class="fw-bold"><?php echo $student->student_fullname($_GET['student'])->fullname ?></span></h3>
    <p>Strand / Grade / Section : 
      <span class="fw-bold">
        <?php echo $student->student_info($_GET['student'])->strand ?>-<?php echo $student->student_info($_GET['student'])->grade_level ?>-<?php echo $student->student_info($_GET['student'])->section ?> 
      </span>
    </p> 
    <div class="mb-3">
      <div id="video-container" class="d-none text-center">
        <video id="qr-video" class="w-75"></video>
      </div> 
    </div> 
    <div class="mb-2">
      <button id="start-button" class="btn"><?php qrcode() ?>Start</button>
      <button id="stop-button" class="btn"><?php qrcode_off() ?>Stop</button>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php icon_settings() ?>Settings</button>
    </div> 
    <div class="mb-2">
      <b>Detected QR code: </b>
      <a href="" id="qrcode_link" target="_blank"><span id="cam-qr-result">None</span></a>
    </div>
    <div class="mb-2 d-none">
      <b>Last detected at: </b>
      <span id="cam-qr-result-timestamp"></span>
    </div> 
    <div class="d-none">
      <h1>Scan from File:</h1>
      <input type="file" id="file-selector">
      <b>Detected QR code: </b>
      <span id="file-qr-result">None</span>
    </div>
    <div class="mb-2">

    <h3>List of Scanned Books</h3>
    </div>
    <div class="mb-2">
      <form 
      
      method="POST" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=perform_transaction'; ?>">
      <input type="hidden" name="student_id" value="<?php echo $_GET['student'] ?>">
      <div class="row row-cards mb-2" id="bookItems"> 
      </div>
      <div class="mb-2">
        <button type="submit" name="btn_process" class="btn" value="1">Process</button>
        <button type="submit" name="btn_cancel" class="btn btn-warning">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div> 
<!-- Modal -->
<div class="modal fade" id="exampleModal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Camera Settings</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"> 
        <div class="mb-2">  
          <label class="form-label">Highlight Style</label>
          <select id="scan-region-highlight-style-select" class="form-control">
              <option value="default-style">Default style</option>
              <option value="example-style-1">Example custom style 1</option>
              <option value="example-style-2">Example custom style 2</option>
          </select>
        </div>
        <div class="mb-2"> 
          <input id="show-scan-region" type="checkbox" class="form-check-input">
          <label>Show scan region canvas</label> 
        </div>
        <div class="mb-2">  
          <select id="inversion-mode-select" class="form-control">
              <option value="original">Scan original (dark QR code on bright background)</option>
              <option value="invert">Scan with inverted colors (bright QR code on dark background)</option>
              <option value="both">Scan both</option>
          </select> 
        </div>
        <div class="mb-2">
          <b>Device has camera: </b>
          <span id="cam-has-camera"></span>
        </div>
        <div class="mb-2">
          <label class="form-label">Preferred camera:</label>
          <select id="cam-list" class="form-control">
              <option value="environment" selected>Environment Facing (default)</option>
              <option value="user">User Facing</option>
          </select>
        </div>
        <div class="mb-2">
          <b>Camera has flash: </b>
          <span id="cam-has-flash"></span>
          <div>
              <button id="flash-toggle">📸 Flash: <span id="flash-state">off</span></button>
          </div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>

<!--<script src="../qr-scanner.umd.min.js"></script>-->
<!--<script src="../qr-scanner.legacy.min.js"></script>-->

<script type="module">  
  import QrScanner from "<?php echo ASSETS ?>/dist/libs/qr-scanner-master/qr-scanner.min.js";
  const video = document.getElementById('qr-video');
  const videoContainer = document.getElementById('video-container');
  const camHasCamera = document.getElementById('cam-has-camera');
  const camList = document.getElementById('cam-list');
  const camHasFlash = document.getElementById('cam-has-flash');
  const flashToggle = document.getElementById('flash-toggle');
  const flashState = document.getElementById('flash-state');
  const camQrResult = document.getElementById('cam-qr-result');
  const camQrResultTimestamp = document.getElementById('cam-qr-result-timestamp');
  const fileSelector = document.getElementById('file-selector');
  const fileQrResult = document.getElementById('file-qr-result');
  const bookItemsContainer = document.getElementById('bookItems'); 
  var qrcodeResult = "";
  <?php  
    if (isset($_SESSION['to_process'])) {
      $_SESSION['to_process'] = array_values($_SESSION['to_process']);
      echo 'renderbookItems('.json_encode($_SESSION["to_process"]).');';
    } 
  ?>
  function check_item(qr){
    if (qrcodeResult != qr) {
      // console.log(qr);
      findBook(qr);
    }
  }

  function renderbookItems(bookItems={}) {
    console.table(bookItems);
    bookItemsContainer.innerHTML = '';
    bookItems.forEach(function(bookItem, index){
      const div = document.createElement('div');
      div.innerHTML = `
          <a href="#" class="card card-link card-link-pop">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <p class="mb-0">Title: <span class="book-title">${bookItem.title}</span></p>
                  <p class="mb-0">Author: <span class="book-author">${bookItem.author}</span></p>
                  <p class="mb-0">ISBN: <span class="book-isbn">${bookItem.isbn}</span></p>
                </div>
                <div>
                  <button type="button" title="Delete Item" class="btn btn-delete btn-icon" data-index="${index}"><?php icon_trash(); ?></button> 
                </div>
              </div>
            </div>
          </a>
      `;
      div.setAttribute('data-index', index);
      bookItemsContainer.appendChild(div);
      div.addEventListener('click', function(e){
        if (event.target.classList.contains('btn-delete')) { 
          let id = parseInt(event.target.dataset.index);
          $.ajax({
            url: '<?php echo URLROOT.'/app/controller/ajax_controller.php?action=remove_item'; ?>',
            type: 'POST',
            dataType: 'json',
            data: {id: id},
          })
          .done(function(res) {
            console.log(res);
            renderbookItems(res);
            console.log("success");
          })
          .fail(function(res) {
            console.log("error");
          });
        }
      })
    });

  } 
     

  function findBook(qrcode){ 
    $.ajax({
      url: '<?php echo URLROOT.'/app/controller/ajax_controller.php?action=add_book_to_borrow'; ?>',
      type: 'POST',
      dataType: 'json',
      data: { qrcode: JSON.stringify(qrcode), id: <?php echo $_GET['student'] ?>},
    })
    .done(function(response) { 
      renderbookItems(response); 
      console.log(response);
    })
    .fail(function(response) {
      console.log(response);
    }); 
  }

  function setResult(label, result) { 
    check_item(result.data)
    qrcodeResult = result.data;
    // console.log(result.data);  
    label.textContent = result.data;
    camQrResultTimestamp.textContent = new Date().toString();
    label.style.color = 'teal';
    clearTimeout(label.highlightTimeout); 
    label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
    
  }

  // ####### Web Cam Scanning #######

  const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
    onDecodeError: error => {
        camQrResult.textContent = error;
        camQrResult.style.color = 'inherit';
    },
    highlightScanRegion: true,
    highlightCodeOutline: true,
  });

  const updateFlashAvailability = () => {
    scanner.hasFlash().then(hasFlash => {
        camHasFlash.textContent = hasFlash;
        flashToggle.style.display = hasFlash ? 'inline-block' : 'none';
    });
  }; 

  QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera);

  // for debugging
  window.scanner = scanner;

  document.getElementById('scan-region-highlight-style-select').addEventListener('change', (e) => {
    videoContainer.className = e.target.value;
    scanner._updateOverlay(); // reposition the highlight because style 2 sets position: relative
  });

  document.getElementById('show-scan-region').addEventListener('change', (e) => {
    const input = e.target;
    const label = input.parentNode;
    label.parentNode.insertBefore(scanner.$canvas, label.nextSibling);
    scanner.$canvas.style.display = input.checked ? 'block' : 'none';
  });

  document.getElementById('inversion-mode-select').addEventListener('change', event => {
    scanner.setInversionMode(event.target.value);
  });

  camList.addEventListener('change', event => {
    scanner.setCamera(event.target.value).then(updateFlashAvailability);
  });

  flashToggle.addEventListener('click', () => {
    scanner.toggleFlash().then(() => flashState.textContent = scanner.isFlashOn() ? 'on' : 'off');
  });

  document.getElementById('start-button').addEventListener('click', () => {
    // scanner.start();
    scanner.start().then(() => {
    updateFlashAvailability();
    // List cameras after the scanner started to avoid listCamera's stream and the scanner's stream being requested
    // at the same time which can result in listCamera's unconstrained stream also being offered to the scanner.
    // Note that we can also start the scanner after listCameras, we just have it this way around in the demo to
    // start the scanner earlier.
    QrScanner.listCameras(true).then(cameras => cameras.forEach(camera => {
      const option = document.createElement('option');
      option.value = camera.id;
      option.text = camera.label;
      camList.add(option);
      }));
    });
    videoContainer.classList.toggle("d-none");
  });

  document.getElementById('stop-button').addEventListener('click', () => {
    scanner.stop();
    videoContainer.classList.toggle("d-none");
  });

  // ####### File Scanning #######

  fileSelector.addEventListener('change', event => {
    const file = fileSelector.files[0];
    if (!file) {
        return;
    }
    QrScanner.scanImage(file, { returnDetailedScanResult: true })
        .then(result => setResult(fileQrResult, result))
        .catch(e => setResult(fileQrResult, { data: e || 'No QR code found.' }));
  });  
</script>

