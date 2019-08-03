<?php
require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'Created Page'; ?>
 <?php 
 include(SHARED_PATH . '/staff_header.php');
 ?>

<?php
if(is_post_request()){



$menu_name = $_POST['menu_name'] ?? '';

$position = $_POST['position'] ?? '';


$visible = $_POST['visible'] ?? '';
	
	$result = insert_page($menu_name,$position,$visible);

		$new_id = mysqli_insert_id($db);
		redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));




}else{
	redirect_to(url_for('/staff/pages/new.php'));
}

?>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
