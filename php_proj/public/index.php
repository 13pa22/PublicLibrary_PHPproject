<?php //index.php
// root of website. The public accessible index default page
require_once('../private/initialize.php');

include('../private/shared/public_header.php');

$page_set =find_all_pages_nullsubject();
$count = mysqli_num_rows($page_set);

?>
<!doctype html>
<div id="main">


	<?php include('../private/shared/public_navigation.php'); ?>

	<div id="page">
		

		<div id = "content">
			<h1> Your Go-To Destination about the KPL! </h1>
			
		
			<div  id = "service-blocks">
				

			<table >

		  	<?php for($i =0; $i < $count; $i++) { 
	        $page = mysqli_fetch_assoc($page_set); ?>
	  	  	<tr>
	        <td style="margin: 10px; padding: 10px;"><a class="action" href="<?php echo url_for('/show_main.php?id=' . $page['id']); ?>"><?php echo $page['menu_name']; ?></a></td>
	    	</tr>
	    	
	    	<?php } ?>

			</table>
		</div>
		



			</div>

			


		</div>



	


	</div>

</div>
	
<?php include('../private/shared/staff_footer.php'); ?>