
<?php 
require_once('../../../private/initialize.php');

?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>



<div id = "content">

	<div class = "actions">
	<a href =" <?php echo url_for('/staff/pages/index.php'); ?>">Back to Pages Sub Menu </a>
	</div>
<?php 


$id = $_GET['id']; 
$page = find_page_by_id($id);


?>

<div class= "page showing">
	<h1> Page for: <?php echo $page['menu_name']; ?> </h1>
	<div class ="attributes">
		<dl>
		<dt> Menu name </dt>
		<dd> <?php echo $page['menu_name'];?></dd>
		</dl>

		<dl>
			<dt> position </dt>
			<dd> <?php echo $page['position'];?></dd>
		</dl>

		<dl>
			<dt> visible </dt>
			<dd><?php if($page['visible']){
				echo "TRUE";
			}else {
				echo "FALSE";
			} ?> </dd>
		</dl>
		<dl>
		<dt> Content: </dt>
		<dd> <?php echo $page['content'];?></dd>
		</dl>
	</div>

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>