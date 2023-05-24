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
          <a href="<?php echo URLROOT ?>/app/views/user" class="btn d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M13 14l-4 -4l4 -4"></path>
             <path d="M8 14l-4 -4l4 -4"></path>
             <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
          </svg>
            Back
          </a>
          <a href="<?php echo URLROOT ?>/app/views/user" class="btn d-sm-none btn-icon" aria-label="Create new report">
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
    <div class="card col-lg-4">
      <div class="card-header">
        <h3 class="card-title">Add New User</h3> 
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo URLROOT ?>/app/controller/usercontroller.php?action=add">
          <?php csrf(); ?> 
            <div class="form-group mb-3">
              <label class="form-label">Fullname</label>
              <input type="text" class="form-control" placeholder="Fullname" name="fullname" autocomplete="off">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Usertype</label>
              <input type="text" class="form-control" placeholder="Usertype" list="usertypes"  name="usertype" autocomplete="off">
              <?php $db->setQuery('SELECT DISTINCT (`usertype`) FROM users'); $usertypes = $db->results_obj(); ?>
              <datalist id="usertypes">
                  <?php foreach ($usertypes as $key => $type): ?> 
                      <option value="<?php echo $type->usertype ?>"> 
                  <?php endforeach ?>
              </datalist>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Password</label>
              <input type="text" class="form-control" placeholder="Password" name="password" autocomplete="off" style="-webkit-text-security: disc;">
            </div> 
          <button type="submit" class="float-right btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>