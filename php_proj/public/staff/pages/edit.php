<?php 

require_once('../../../private/initialize.php'); ?>
<?php

$id = $_GET['id'];



if(is_post_request()){


$page = [];
$page['id'] = $id;
$page['menu_name'] = $_POST['menu_name'] ?? '';

$page['position'] = $_POST['position'] ?? '';


$page['visible'] = $_POST['visible'] ?? '';



$sql = "UPDATE pages SET ";
$sql .= "menu_name='" . $page['menu_name'] . "', ";
$sql .= "position='" . $page['position'] . "', ";

$sql .= "visible='" . $page['visible'] . "' ";

$sql .= "WHERE id = '" . $id . "' ";

$sql .= "LIMIT 1";

$result = mysqli_query($db,$sql);
	// for update queries, result is either true or false.
	if($result){
		redirect_to(url_for('/staff/pages/show.php?id=' . $id));

	}else {
		echo "Update Failed";
		db_disconnect($db);
		exit;
	}
}else {  
	$page = find_page_by_id($id);

}

?>


<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">


<a class = "back" href = "<?php echo url_for('/staff/pages/index.php'); ?>"> Back to Pages Submenu </a>

	<div class = "edit-page">
		<h1> Edit Page </h1>
		<form action="<?php echo url_for('/staff/pages/edit.php?id=' . $id); ?>" method="post">
      <dl>
        <dt>Menu Name </dt>
        <dd><input type="text" name="menu_name" value="<?php echo $page['menu_name']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1" <?php if($page['position']=='1'){echo "selected";} ?> >1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php if($page['visible'] =='1'){echo "checked";} ?> />
        </dd>
      </dl>
      <dl>
        <dt>Content </dt>
        <dd><input type="text" name="content" value="<?php echo $page['content']; ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Page" />
      </div>
    </form>


	</div>








</div>









<?php include(SHARED_PATH . '/staff_footer.php'); ?>