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
          <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows" class="btn d-none d-sm-inline-block"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
             <path d="M13 14l-4 -4l4 -4"></path>
             <path d="M8 14l-4 -4l4 -4"></path>
             <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
          </svg>
            Back
          </a>
          <a href="<?php echo URLROOT ?>/app/views/transaction/?view=borrows" class="btn d-sm-none btn-icon" aria-label="Create new report">
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
        <h3 class="card-title">Search Student (Last name, First name)</h3> 
      </div>
      <div class="card-body"> 
        <div class="mb-3">
          <input type="hidden" name="view" value="scanner"> 
          <input type="text" list="student_lists" id="student" name="student" class="form-control" autocomplete="off">
          <?php placeholders(); ?>
          <div id="result">
            
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript"> 
  $(document).ready(function() {
     
    $('#student').on('keyup', function(){
      let result = $('#result'); 
      let student_name = $(this).val();
      if (student_name != "") {
        document.getElementById('placeholder').classList.remove("d-none");
        $.ajax({
          url: '<?php echo URLROOT.'/app/controller/ajax_controller.php?action=search_student'; ?>',
          type: 'POST',
          dataType: 'json',
          data: {student_name: student_name},
        })
        .done(function(data) { 
          document.getElementById('placeholder').classList.add("d-none");
          result.html("");
          if(data.length > 0){
            $.each(data, function(index, val) {
            result.append(`
                <a href="?view=scanner&student=${val.id}" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="avatar avatar-rounded"></div>
                    </div>
                    <div class="col-7">
                      <p class="mb-0">${val.last_name} , ${val.first_name} ${val.middle_name[0]}. </p>
                      <span>${val.strand} ${val.grade_level}-${val.section}</span>
                    </div>
                    <div class="col-2 ms-auto text-end">
                      <button class="btn">Select Student</button>  
                    </div>
                  </div>
                </a>
              `);
            });
          }else{
            result.append(`
              <a href="#" class="list-group-item list-group-item-action" aria-current="true"><span class="text-danger">No matches found</span></a>
            `);
          }
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
      }else{
        result.html("");
      }
      
    });
  });
</script>