<?php


function find_all_subjects(){

	global $db;
	$sql = "Select * from subjects ";

 	$sql .= "ORDER BY position ASC;";

  	$result = mysqli_query($db,$sql);
  	return $result;
}

function find_all_pages(){

	global $db;
	$sql = "Select * from pages ";

  	$sql .= "ORDER BY position ASC;";

  	$result = mysqli_query($db,$sql);
  	return $result;
}


function find_all_pages_nullsubject(){

	global $db;
	$sql = "Select * from pages where subject_id is NULL ";

  	$sql .= "ORDER BY position ASC;";

  	$result = mysqli_query($db,$sql);
  	return $result;
}

function find_page_by_id($id){
	global $db;

	$sql = "select * from pages ";
	$sql .= "WHere id=" . $id;

	$result = mysqli_query($db,$sql);
	$page = mysqli_fetch_assoc($result);
 	mysqli_free_result($result);
	return $page;
}

function find_pages_by_id($subject_id){
	global $db;

	$sql = "select * from pages ";
	$sql .= "Where subject_id=" . $subject_id;
	$sql .= " order by position ASC";

	$result = mysqli_query($db,$sql);
	return $result;
}


function insert_page($menu_name,$position,$visible){

	global $db;

	$sql = "INSERT into pages ";
	$sql .= "(menu_name,position,visible) ";
	$sql .= "VALUES (";

	$sql .= "'" . $menu_name . "',";

	$sql .= "'" . $position . "',";

	$sql .= "'" . $visible . "'";

	$sql .= ")";

	$result = mysqli_query($db,$sql);

	if($result){
		return true;

	}else{
		echo "insert failed";
		db_disconnect($db);
		exit;
}


}

function delete_page($id){
	//sql for deleting page
	global $db;
	$sql = "DELETE FROM pages ";
	$sql .= "where id='" . $id . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db,$sql);

	// for delete statements = true or false,
	// use this result to redirect to a confirm or fail of delete operaiton .
	if($result){
		return true;
	}else{
		echo "delete failed";
		db_disconnect($db);
		exit;
	}
}


function find_subject_by_id($id){
	global $db;

	$sql = "select * from subjects ";
	$sql .= "WHere id=" . $id;

	$result = mysqli_query($db,$sql);
	$subject = mysqli_fetch_assoc($result);
 	mysqli_free_result($result);
	return $subject;
}




function insert_subject($menu_name,$position,$visible){

	global $db;

	$errors = validate_subject($subject); //result is array of errors.
    if(!empty($errors)){
    	return $errors;
    }


	$sql = "INSERT into subjects ";
	$sql .= "(menu_name,position,visible) ";
	$sql .= "VALUES (";

	$sql .= "'" . $menu_name . "',";

	$sql .= "'" . $position . "',";

	$sql .= "'" . $visible . "'";

	$sql .= ")";

	$result = mysqli_query($db,$sql);

	if($result){
		return true;

	}else{
		echo "insert failed";
		db_disconnect($db);
		exit;
	}
}


function delete_subject($id){
	//sql for deleting page
	global $db;
	$sql = "DELETE FROM subjects ";
	$sql .= "where id='" . $id . "' ";
	$sql .= "LIMIT 1";

	$result = mysqli_query($db,$sql);

	// for delete statements = true or false,
	// use this result to redirect to a confirm or fail of delete operaiton .
	if($result){
		return true;
	}else{
		echo "delete failed";
		db_disconnect($db);
		exit;
	}
}


function update_subject($subject) {
    global $db;

   $errors = validate_subject($subject); //result is array of errors.

    if(!empty($errors)){
    	return $errors;

    }

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
    $sql .= "position='" . $subject['position'] . "', ";
    $sql .= "visible='" . $subject['visible'] . "' ";
    $sql .= "WHERE id='" . $subject['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo "failed";
      db_disconnect($db);
      exit;
    }

  }

function validate_subject($subject){
 

 $errors = [];
  
  // menu_name
  if(is_blank($subject['menu_name'])) {
    $errors[] = "Name cannot be blank.";
  }
  if(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // position
  // Make sure we are working with an integer
  $postion_int = (int) $subject['position'];
  if($postion_int <= 0) {
    $errors[] = "Position must be greater than zero.";
  }
  if($postion_int > 999) {
    $errors[] = "Position must be less than 999.";
  }

  // visible
  // Make sure we are working with a string
  $visible_str = (string) $subject['visible'];
  if(!has_inclusion_of($visible_str, ["0","1"])) {
    $errors[] = "Visible must be true or false.";
  }

  return $errors;



}

?>