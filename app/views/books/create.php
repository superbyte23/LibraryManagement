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
    <div class="card col-lg-6">
      <div class="card-header">
        <h3 class="card-title">Add New Book Form</h3> 
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=add'; ?>">
          <?php csrf(); ?> 
            <div class="form-group mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" placeholder="Enter book title..." name="title" required>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Author</label>
              <input type="text" class="form-control" placeholder="Enter book author..." name="author" required>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Publisher</label>
              <input type="text" class="form-control" placeholder="Enter book publisher..." name="publisher" required>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Publication Year</label>
              <input type="text" class="form-control" placeholder="Enter book publication Year..." name="year_published" required>
            </div> 
          <button type="submit" class="float-right btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>