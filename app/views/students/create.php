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
          <a href="<?php echo URLROOT ?>/app/views/students" class="btn d-none d-sm-inline-block"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M13 14l-4 -4l4 -4"></path>
             <path d="M8 14l-4 -4l4 -4"></path>
             <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
          </svg>
            Back
          </a>
          <a href="<?php echo URLROOT ?>/app/views/students" class="btn d-sm-none btn-icon" aria-label="Create new report">
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
      <div class="card-header">
        <h3 class="card-title">Add New Student Form</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=add'; ?>">
          <?php csrf(); ?>
          <div class="row">
            <div class="form-group mb-3 col-lg-4">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" name="first_name" placeholder="Enter first name..." required>
            </div>
            <div class="form-group mb-3 col-lg-4">
              <label class="form-label">Middle Name</label>
              <input type="text" class="form-control" name="middle_name" placeholder="Enter middle name..." required>
            </div>
            <div class="form-group mb-3 col-lg-4">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" name="last_name" placeholder="Enter last name..." required>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-lg-4">
              <label class="form-label">Grade Level</label>
              <select name="grade_level" class="form-select" required>
                <!-- <option>Select Grade Level</option>  -->
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
            </div>
            <div class="mb-3 col-lg-4">
              <label class="form-label">Strand</label>
              <select name="strand" class="form-select" required>
                <!-- <option>Select Strand</option> -->
                <option>HUMMS</option>
                <option>ABM</option>
                <option>SMAW</option>
                <option>STEM</option>
                <option>Cookery </option>
                <option>Comprog</option>
                <option>EIM</option>
                <option>Performing Arts </option>
                <option>Hairdressing</option>
                <option>Sports Science</option>
                <option>Agri-Fishery Arts</option>
              </select>
            </div>
            <div class="mb-3 col-lg-4">
              <label class="form-label">Section</label>
              <select name="section" class="form-select" required>
                <!-- <option>Select Section</option> -->
                <option>A</option>
                <option>B</option>
                <option>C</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group mb-3 col-lg-6">
              <label class="form-label">Mobile</label>
              <input type="text" class="form-control" name="mobile" placeholder="Enter mobile number..." required>
            </div>
            <div class="form-group mb-3 col-lg-6">
              <label class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" placeholder="Enter E-mail..." required>
            </div>
          </div>
          <button type="submit" class="float-right btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>