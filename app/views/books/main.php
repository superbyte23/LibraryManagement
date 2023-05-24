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
          <a href="?view=create" class="btn d-none d-sm-inline-block">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Add New Book
          </a>
          <a href="?view=create" class="btn d-sm-none btn-icon" aria-label="Create new report">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
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
        <table class="table card-table table-vcenter table-striped text-nowrap datatable"> 
          <thead class="thead-light">
            <tr>
              <!-- <th>#</th> -->
              <th>Book Info</th> 
              <th class="w-1">Actions</th>
            </tr>
          </thead>
          <tbody> 
            <?php foreach ($books as $key =>  $book): ?>

              <tr>
                <!-- <td class="small"><?php echo $key+1; ?></td> -->
                <td>
                  <p class="text-truncate mb-0 fw-bold"><?php echo $book->title ?></p>
                  <small class="text-wrap"><span class="fw-bold">Author</span> : <?php echo $book->author ?></small><br>
                  <small><span class="fw-bold">Publisher</span> : <?php echo $book->publisher ?> (<?php echo $book->year_published ?>)</small>
                </td>  
                <td>
                  <a href="./?view=isbn&id=<?php echo $book->id ?>" class="btn p-2"><?php icon_view(); ?> <span class="d-none d-lg-block ms-2">View Inventory</span></a>
                  <a href="./?view=edit&id=<?php echo $book->id ?>" class="btn p-2"><?php icon_edit(); ?> <span class="d-none d-lg-block ms-2">Edit</span></a>
                  <form 
                  onsubmit="return showConfirm('Are you sure you want to proceed?', 'warning');" 
                  method="POST" class="d-inline validate" 
                  action="<?php echo URLROOT.'/app/controller/'.$this_controller.'?action=destroy'?>">
                    <?php csrf(); ?>
                    <input type="hidden" name="id" value="<?php echo $book->id ?>">
                    <button type="submit" class="btn p-2 btn-pink"><?php icon_trash(); ?> <span class="d-none d-lg-block ms-2">Delete</span></button>
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