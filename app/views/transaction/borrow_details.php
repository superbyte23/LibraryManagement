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
            Back
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
    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="card-title text-uppercase">Student info</div>
          </div>
          <div class="col-auto ms-auto d-print-none">
            <form onsubmit="return showConfirm('Are you sure you want to proceed?', 'warning');" method="POST" class="d-inline validate" action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=delete_transaction'?>">
              <?php csrf(); ?>
              <input type="hidden" name="id" value="<?php echo $transaction->id ?>">
              <button type="submit" class="btn btn-pink"><?php icon_trash() ?><span class="ms-2">Delete</span></button>
            </form>
          </div>
        </div>
        <div class="mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
             <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
             <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
          </svg>
          Name: <strong><?php echo $student->student_info($transaction->student_id)->last_name, ", ", $student->student_info($transaction->student_id)->first_name, " ", substr($student->student_info($transaction->student_id)->middle_name, 0, 1), "." ?></strong>
        </div>
        <div class="mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-hexagon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path>
   <path d="M12 9h.01"></path>
   <path d="M11 12h1v4h1"></path>
</svg>
          Grade/Section: <strong><?php echo $student->student_info($transaction->student_id)->grade_level, " ", $student->student_info($transaction->student_id)->strand, " ", $student->student_info($transaction->student_id)->section ?></strong>
        </div>
        <div class="mb-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-123" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M3 10l2 -2v8"></path>
   <path d="M9 8h3a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-2a1 1 0 0 0 -1 1v2a1 1 0 0 0 1 1h3"></path>
   <path d="M17 8h2.5a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1 -1.5 1.5h-1.5h1.5a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1 -1.5 1.5h-2.5"></path>
</svg>
          Total Books Borrowed: <strong><?php echo count($transactions_details); ?></strong>
        </div> 
      </div>
    </div>
    <div class="card mb-3"> 
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable"> 
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Book Title</th>   
              <th class="w-1">Handle</th>
            </tr>
          </thead>
          <tbody> 
            <?php foreach ($transactions_details as $key =>  $item): ?> 
              <tr>
                <td class="small"><?php echo $key+1; ?></td> 
                <td>
                  <p class="mb-0"><span class="fw-bold">Title</span> : <?php echo $book->get_by_id($item->book_id)->title ?></p>
                  <p class="mb-0 text-wrap"><span class="fw-bold">Author</span> : <?php echo $book->get_by_id($item->book_id)->author ?></p>
                  <p class="mb-0"><span class="fw-bold">ISBN</span> : <?php echo $item->isbn ?></p>
                </td>   
                <td>
                  <!-- <a href="./?view=borrowDetails&borrow_id=<?php echo $item->id ?>" class="btn p-2"><?php icon_edit(); ?> <span class="d-none d-lg-block ms-2">View Details</span></a> -->
                  <!-- <a href="./?view=edit&id=<?php echo $item->id ?>" class="btn"><i class="fa fa-edit me-1"></i> Edit</a> -->
                  <!-- <form  method="POST" class="d-inline validate" action="<?php echo URLROOT.'/app/controller/usercontroller.php?action=destroy'?>">
                    <?php csrf(); ?>
                    <input type="hidden" name="id" value="<?php echo $item->id ?>">
                    <button type="submit" class="btn btn-pink"><i class="fa fa-trash me-1"></i> Update Status</button>
                  </form> -->
                </td>
              </tr> 
            <?php endforeach ?> 
          </tbody>
        </table>
      </div>
    </div>
    <form action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=return_books'; ?>" method="POST">
      <input type="hidden" name="borrow_id" value="<?php echo $_GET['borrow_id']; ?>">
      <?php if ($transaction->status == 'Borrowed'): ?>
        <button class="btn btn-info w-100"><?php icon_check() ?> Return</button>
      <?php else: ?>
        <button class="btn btn-success w-100 disabled"><?php icon_check() ?>Returned</button>
      <?php endif ?>
      
    </form> 
  </div>
</div> 