<?php 
require_once('../../../private/initialize.php');

?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


<?php
$id = $_GET['id'];
$subject = find_subject_by_id($id);
?>


<div id = "content">

	<div class = "actions">
	<a href =" <?php echo url_for('/staff/subjects/index.php'); ?>">Back to Subjects Sub Menu </a>
	</div>
	<div class = "show-subject">

	<h1> Subject: <?php echo $subject['menu_name']; ?> </h1>

		<div class="attributes">
		<dl>
		<dt> Menu name </dt>
		<dd> <?php echo $subject['menu_name'];?></dd>
		</dl>

		<dl>
			<dt> Position </dt>
			<dd> <?php echo $subject['position'];?></dd>
		</dl>

		<dl>
			<dt> Visible </dt>
			<dd><?php if($subject['visible']){
				echo "TRUE";
			}else {
				echo "FALSE";
			} ?> </dd>
		</dl>
		

		</div>

	</div>





</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>