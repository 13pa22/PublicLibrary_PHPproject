<?php 
require_once('../../../private/initialize.php');

$id = $_GET['id'];



if(is_post_request()){
	delete_page($id);
	redirect_to(url_for('/staff/pages/index.php'));
}else {
	$page = find_page_by_id($id);
}
?>

<?php $page_title = 'Delete Page'; ?>
 <?php 
 include(SHARED_PATH . '/staff_header.php');
 ?>
<div id ="content">

	<a href =" <?php echo url_for('/staff/pages/index.php'); ?>">Back to Pages Sub Menu </a>

		<div class = "page delete">

		<h1> Delete Page </h1>
		<p> Are you sure you want to delet the page: </p>
		<p class = "item"><?php echo $page['menu_name']; ?> </p>

		<form action = "<?php echo url_for('/staff/pages/delete.php?id=' . $page['id'])?>" method="post">
			<div id= "operations">
				<input type="submit" name="commit" value="Delete Page" />
			</div>
		</form>
	</div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
