<?php  
include '../../bootstrapper.php';
if (!isset($_SESSION['userid'])){ 
	redirect(URLROOT.'/app'); 
}else{ 
	
	$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
	 
	if ($user->getUser($_SESSION['userid'])->usertype == 'admin') {
		switch ($view) {
			 
			default: 
				$pagetitle = "Admin Dashboard";
	    		$content = "dashboard.php";
				break;
		}
	}else{
		redirect(URLROOT.'/app/views/transaction/?view=borrows');
		switch ($view) {
			case '404':
				$content = "404.php";
			break;  
			default:
				$pagetitle = "Dashboard";
	    		$content = "dashboard.php";
				break;
		}
	} 
	 

} 
include APPROOT.'/layout/template.php';
?>
<!-- <script src="<?php echo URLROOT ?>/public/plugins/chart.js/Chart.min.js"></script> -->
<!-- <script src="<?php echo URLROOT ?>/public/dist/js/pages/dashboard3.js"></script> -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.link-layout-list').on('click', function(){
			$('.row-cards').removeClass('row-cols-lg-3 row-cols-xl-4');
		});

		$('.link-layout-grid').on('click', function(){
			$('.row-cards').addClass('row-cols-lg-3 row-cols-xl-4');
		}); 
	});
</script> 
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->