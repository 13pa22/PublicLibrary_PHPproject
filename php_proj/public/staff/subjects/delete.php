<?php 
require_once('../../../private/initialize.php');

$id = $_GET['id'];



if(is_post_request()){
	delete_subject($id);
	redirect_to(url_for('/staff/subjects/index.php'));
}else {
	$subject = find_subject_by_id($id);
}
?>

<?php $page_title = 'Delete Subject'; ?>
 <?php 
 include(SHARED_PATH . '/staff_header.php');
 ?>
<div id ="content">

	<a href =" <?php echo url_for('/staff/subjects/index.php'); ?>">Back to Subjects Sub Menu </a>

		<div class = "subject delete">

		<h1> Delete Subject </h1>
		<p> Are you sure you want to delete the subject: </p>
		<p class = "item"><?php echo $subject['menu_name']; ?> </p>

		<form action = "<?php echo url_for('/staff/subjects/delete.php?id=' . $subject['id'])?>" method="post">
			<div id= "operations">
				<input type="submit" name="commit" value="Delete Subject" />
			</div>
		</form>
	</div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>
