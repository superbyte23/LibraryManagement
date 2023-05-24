<?php
  $path = $_SERVER['SCRIPT_NAME'];
  if (basename($path) != 'index.php') {
    header('location: index.php?view=404');
  }
?>
<div class="container">
  <!-- Page title -->
  <div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
          Overview
        </div>
        <h4 class="page-title">
        <?php echo $pagetitle ?>
        </h4> 
      </div> 
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row row-cards">
          <div class="col-xl-4 col-lg-6 col-6">
            <div class="gradient-dark card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="gradient-indigo avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                      <?php icon_book() ?>
                    </span>
                  </div>
                  <div class="col">
                    <h4 class="fw-bold mb-0">
                      <?php echo count($isbn->all()) ?> Total Books
                    </h4>
                    <a href="<?php echo URLROOT ?>/app/views/books" class="fw-medium mb-0">
                      View Full Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-6">
            <div class="gradient-dark card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="gradient-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                      <?php icon_student(); ?>
                    </span>
                  </div>
                  <div class="col">
                    <h4 class="fw-bold mb-0">
                      <?php echo count($student->all()) ?> Students
                    </h4>
                    <a href="<?php echo URLROOT ?>/app/views/students" class="fw-medium mb-0">
                      View Full Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-6">
            <div class="gradient-dark card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="gradient-cyan text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                      <?php icon_users(); ?>
                    </span>
                  </div>
                  <div class="col">
                    <h4 class="fw-bold mb-0">
                      <?php echo count($user->all()) ?> Users
                    </h4>
                    <a href="<?php echo URLROOT ?>/app/views/user" class="fw-medium mb-0">
                      View Full Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="col-xl-4 col-lg-6 col-6">
            <div class="gradient-dark card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="gradient-warning text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/message -->
                      <?php arrow_right_left(); ?>
                    </span>
                  </div>
                  <div class="col">
                    <h4 class="fw-bold mb-0">
                      <?php echo count($borrow->all()) ?> Total Transactions
                    </h4>
                    <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows" class="fw-medium mb-0">
                      View Full Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-6">
            <div class="gradient-dark card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="gradient-teal text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                      <?php icon_check() ?>
                    </span>
                  </div>
                  <div class="col">
                    <h4 class="fw-bold mb-0">
                      <?php echo count($borrow->filter_by_status('returned')) ?> Completed
                    </h4>
                    <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows&status=returned" class="fw-medium mb-0">
                      View Full Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-6">
            <div class="gradient-dark card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="gradient-danger text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                     <?php icon_activity(); ?>
                    </span>
                  </div>
                  <div class="col">
                    <h4 class="fw-bold mb-0">
                      <?php echo count($borrow->filter_by_status('borrowed')) ?> Active Transaction
                    </h4>
                    <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows&status=borrowed" class="fw-medium mb-0">
                      View Full Details
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="12">
            <div class="gradient-gray-dark card card-sm">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="bg-transparent text-white avatar avatar-xl"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                      <?php qrcode(); ?>
                    </span>
                  </div>
                  <div class="col">
                    <h2 class="fw-bold mb-0">
                      New Transaction
                    </h2>
                    <a href="<?php echo URLROOT ?>/app/views/transaction/" class="fw-medium mb-0">
                      Create new transaction
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>            
        </div>
      </div> 
    </div>
  </div>
</div>
<style type="text/css">
.gradient-blue {
  background: linear-gradient(to right, #206bc4, #4299e1);
  color: white;
}

.gradient-indigo {
  background: linear-gradient(to right, #4263eb, #7594f5);
  color: white;
}

.gradient-purple {
  background: linear-gradient(to right, #ae3ec9, #d37fdf);
  color: white;
}

.gradient-pink {
  background: linear-gradient(to right, #d6336c, #f25d8e);
  color: white;
}

.gradient-red {
  background: linear-gradient(to right, #d63939, #f36969);
  color: white;
}

.gradient-orange {
  background: linear-gradient(to right, #f76707, #fd9343);
  color: white;
}

.gradient-yellow {
  background: linear-gradient(to right, #f59f00, #fab83f);
  color: black;
}

.gradient-green {
  background: linear-gradient(to right, #2fb344, #5dd277);
  color: white;
}

.gradient-teal {
  background: linear-gradient(to right, #0ca678, #41c2a6);
  color: white;
}

.gradient-cyan {
  background: linear-gradient(to right, #17a2b8, #52c1d8);
  color: white;
}

.gradient-dark {
  background: linear-gradient(to right, #ffffff, #f1f5f9);
  color: black;
}

.gradient-gray {
  background: linear-gradient(to right, #475569, #7594a8);
  color: white;
}

.gradient-gray-dark {
  background: linear-gradient(to right, #1e293b, #41566e);
  color: white;
}

.gradient-gray-100 {
  background: linear-gradient(to right, #f1f5f9, #e9eff6);
  color: black;
}

.gradient-gray-200 {
  background: linear-gradient(to right, #e2e8f0, #dbe2eb);
  color: black;
}

.gradient-gray-300 {
  background: linear-gradient(to right, #cbd5e1, #c5ceda);
  color: black;
}

.gradient-gray-400 {
  background: linear-gradient(to right, #94a3b8, #a3b3c7);
  color: white;
}

.gradient-gray-500 {
  background: linear-gradient(to right, #64748b, #8796a5);
  color: white;
}

.gradient-gray-600 {
  background: linear-gradient(to right, #475569, #657386);
  color: white;
}

.gradient-gray-700 {
  background: linear-gradient(to right, #334155, #4e5e74);
  color: white;
}

.gradient-gray-800 {
  background: linear-gradient(to right, #1e293b, #384559);
  color: white;
}

.gradient-gray-900 {
  background: linear-gradient(to right, #0f172a, #253448);
  color: white;
}

.gradient-primary {
  background: linear-gradient(to right, #206bc4, #4299e1);
  color: white;
}

.gradient-secondary {
  background: linear-gradient(to right, #626976, #8a9099);
  color: white;
}

.gradient-success {
  background: linear-gradient(to right, #2fb344, #5dd277);
  color: white;
}

.gradient-info {
  background: linear-gradient(to right, #4299e1, #6ab7f7);
  color: white;
}

.gradient-warning {
  background: linear-gradient(to right, #f76707, #fd9343);
  color: white;
}

.gradient-danger {
  background: linear-gradient(to right, #d63939, #f36969);
  color: white;
}

.gradient-light {
  background: linear-gradient(to right, #fafbfc, #f5f7f9);
  color: black;
}

.gradient-dark {
  background: linear-gradient(to right, #1e293b, #384559);
  color: white;
}

.gradient-muted {
  background: linear-gradient(to right, #626976, #8a9099);
  color: white;
}

</style>