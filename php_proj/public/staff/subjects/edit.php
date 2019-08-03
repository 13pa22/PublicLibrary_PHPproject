<?php 

require_once('../../../private/initialize.php'); ?>
<?php

$id = $_GET['id'];



if(is_post_request()){


$page = [];
$subject['id'] = $id;
$subject['menu_name'] = $_POST['menu_name'] ?? '';

$subject['position'] = $_POST['position'] ?? '';


$subject['visible'] = $_POST['visible'] ?? '';



$sql = "UPDATE subjects SET ";
$sql .= "menu_name='" . $subject['menu_name'] . "', ";
$sql .= "position='" . $subject['position'] . "', ";

$sql .= "visible='" . $subject['visible'] . "' ";

$sql .= "WHERE id = '" . $id . "' ";

$sql .= "LIMIT 1";

$result = mysqli_query($db,$sql);
  // for update queries, result is either true or false.
  if($result){
    redirect_to(url_for('/staff/subjects/show.php?id=' . $id));

  }else {
    echo "Update Failed";
    db_disconnect($db);
    exit;
  }
}else {  
  $subject = find_subject_by_id($id);

}

?>


<?php $page_title = 'Edit subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">


<a class = "back" href = "<?php echo url_for('/staff/subjects/index.php'); ?>"> Back to subjects Submenu </a>

  <div class = "edit-subject">
    <h1> Edit subject </h1>
    <form action="<?php echo url_for('/staff/subjects/edit.php?id=' . $id); ?>" method="post">
      <dl>
        <dt>Menu Name </dt>
        <dd><input type="text" name="menu_name" value="<?php echo $subject['menu_name']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1" <?php if($subject['position']=='1'){echo "selected";} ?> >1</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" <?php if($subject['visible'] =='1'){echo "checked";} ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit subject" />
      </div>
    </form>


  </div>








</div>









<?php include(SHARED_PATH . '/staff_footer.php'); ?>