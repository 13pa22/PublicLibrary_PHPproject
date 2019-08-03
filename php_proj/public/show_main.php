<?php // show main page 

require_once('../private/initialize.php');

include('../private/shared/public_header.php')
?>


<div id = "main">
	
	<button type = "button">	<a href =" <?php echo url_for('/index.php'); ?>">Back to Main Menu </a> </button>

<div id= "content">


<?php 
$id = $_GET['id']; 
$page = find_page_by_id($id); ?>

<div class= "page showing">
	<h1> <?php echo $page['menu_name']; ?> </h1>
	<div class ="attributes">
		<dl>
				<dd> <?php echo $page['content'];?></dd>
		</dl>
	
	</div>

</div>




</div>

</div>


<?php include('../private/shared/staff_footer.php'); ?>