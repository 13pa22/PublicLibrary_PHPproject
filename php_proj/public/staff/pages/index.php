<?php// public.staff.pages.index.php

/*options for subpages:
	-adult material
	-kids material
*/

?>

<?php require_once('../../../private/initialize.php'); ?>

<?php // STAND IN FOR A MAKE UP DATABASE. ARRAYS WITH KEYS>VALUES

  $page_set = find_all_pages();
  $count = mysqli_num_rows($page_set);

?>
<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id = "content">

	<div class="pages listings">
		<h1> Pages </h1>

		<div class="actions">

			<a class="action" href="<?php echo url_for('/staff/pages/new.php'); ?>">Create New Page</a>

		</div>

		<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

  	  <?php for($i =0; $i < $count; $i++) { 
        $page = mysqli_fetch_assoc($page_set); ?>
  	  	 <tr>
          <td><?php echo $page['id']; ?></td>
          <td><?php echo $page['position']; ?></td>
          <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo $page['menu_name']; ?></td>

          <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . $page['id']); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . $page['id']); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/pages/delete.php?id=' . $page['id']); ?>">Delete</a></td>
    	  </tr>

		</div>
		<?php } ?>
  	</table>

 <?php mysqli_free_result($page_set); ?>

	</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>