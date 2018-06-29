<?php
require_once 'incl/init.php';
//Site URL
$pageUrl = "users.php";
// Site Content
$page_content = "users";
if (!$auth->user_data["edit_$page_content"]) {
	// Redirect to CMS Index
	header("Location: /admin/index.php");
}
else {

$mode = filter_input( INPUT_POST, "mode", FILTER_SANITIZE_STRING );
if ( empty( $mode ) ) {
	$mode = filter_input( INPUT_GET, "mode", FILTER_SANITIZE_STRING );
}
if ( empty( $mode ) ) {
	$mode = "list";
}

//Site Area
$pageTitle = "User";
//Site Section
$pageSection = "";
//Set ID from GET variable
	$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
switch ( strtoupper( $mode ) ) {

	/* -----------------------------------------------------------------------------------------
	/* - LIST CASE (start) - */
	case "LIST":
		$pageSection = "List";
		require_once ADMINROOT . 'incl/header.php';
		echo "<div class='container'>
            <a href='?mode=edit'><h6>Add New User</h6></a>                
        </div>
        <hr>
        <div class='container'>
        <table class='table'>
            <thead>
                <tr>
                    <th></th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                </tr>
            </thead>";

		/* Call User Class */
		$user = new user();
		/* Ask Class for a list (method) & loop it*/
		foreach ( $user->list_all() as $key => $arrValues ) {
			echo "<tr>
                <td>
                    <a href='?mode=edit&id=$arrValues[id]'><i class='material-icons'>mode_edit</i></a>
                    <a href='?mode=delete&id=$arrValues[id]'><i class='material-icons'>delete</i></a>
                </td>
                <td><a href='?mode=details&id=" . $arrValues['id'] . "'>" . $arrValues['user_name'] . "</a></td>
                <td>$arrValues[email]</td>
                <td>$arrValues[user_type]</td>
              </tr>";
		}
		require_once ADMINROOT . 'incl/footer.php';
		echo "</table></div>";
		break;
	/* - LIST CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - DETAILS CASE (start) - */
	case "DETAILS":
		$pageSection = "Details";
		require_once ADMINROOT . 'incl/header.php';

		$id = (int) $_GET['id'];

		/* Call User Class */
		$user = new user();
		/* Ask Class for a specific item */
		$user->get_item( $id );

		echo "<div class='container'>
            <a href='?mode=list'><h6>Back To List</h6></a>
            <a href='?mode=edit'><h6>Add New User</h6></a>
            <a href='?mode=edit&id=$id'><h6>Edit</h6></a>
        </div>
        <hr>
        <div class='container'>
            <h2>$user->user_name</h2>
            <h4>$user->user_type</h4>
            <a href='?mode=delete&id=$id'><i class='material-icons'>delete</i></a>
            <pre>" . $user->content . "</pre>
         </div>";


		require_once ADMINROOT . 'incl/footer.php';
		break;
	/* - DETAILS CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - EDIT CASE (start) - */
	case "EDIT":
		$pageSection = "Create";

		//One line IF statement, IF $_POST[id] is set, check it's an INT, ELSE set it to 0
		$id        = isset( $_GET['id'] ) ? (int) $_GET['id'] : 0;
		$user_name = "";
		$user_type = "";
		$email     = "";

		/* Check if it an Edit or Create case, and fetch data if edit */
		if ( $id > 0 ) {
			$user = new user();
			$user->get_item( $id );

			$user_name = $user->user_name;
			$user_type = $user->user_type;
			$email     = $user->email;

			$pageSection = "Update";
		}

		require_once ADMINROOT . 'incl/header.php';

		echo "<div class='container'>
            <a href='?mode=list'><h6>Back To List</h6></a>";
		if ( $id ) {
			echo "<a href='?mode=details&id=$id'><h6>Back To Details</h6></a>";
		}

		/* Creation & Update Form */
		echo "</div>
        <hr>
        <form method='post' class='container'>
            <input type='hidden' name='mode' value='save'>
            <input type='hidden' name='id' value='$id'>
            <!-- User Name -->
            <div class='form-group' data-group='user_name'>
                <label class='col-sm-3 control-label' for='title'>User Name</label>
                <div class='col-sm-9'>
                    <input type='text' class='form-control' for='user_name' name='user_name' id='user_name' value='$user_name'>
                </div>
            </div>
            
            <!-- User Type -->
            <div class='form-group'>
                <label class='col-sm-3 control-label' for='user_type'>User Type</label>
                <div class='col-sm-9'>
                    <select class='form-control input-search-single' id='user_type' name='user_type'>";
		/* - Call Artist Class - */
		$user = new user();


		/* ------------------------- DU ER KOMMET HERTIL --------------------------- */


		/* Loop through user type options, via User Class (list method) */
		foreach ( $user->list_all_user_types() as $key => $arrValues ) {
			if ( $artist_id == $arrValues['id'] ) {
				echo "<option value='$arrValues[id]' selected>$arrValues[name]</option>";
			} else {
				echo "<option value='$arrValues[id]'>$arrValues[name]</option>";
			}

		}

		echo "</select></div>
                </div>
                            
            <!-- Content -->
            <div class='form-group' data-group='content'>
                <label class='col-sm-3 control-label' for='title'>Content</label>
                <div class='col-sm-9'>
                    <textarea rows='10' type='text' class='form-control' for='content' name='content' id='content'>$content</textarea>
                </div>
            </div>   
            <div class='col-sm-9'>      
                <button type='submit' class='btn btn-success'>Save</button>
            </div>   
        </form>";
		require ADMINROOT . "incl/footer.php";
		break;
	/* - EDIT CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - SAVE CASE (start) - */
	case "SAVE":

		$song            = new song();
		$song->id        = (int) $_POST['id'];
		$song->title     = $_POST['title'];
		$song->artist_id = $_POST['artist_id'];
		$song->content   = $_POST['content'];
		$id              = $song->save_item();

		header( "location: ?mode=details&id=$id" );

		break;
	/* - SAVE CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - DELETE CASE (start) - */
	case "DELETE":

		$song     = new song();
		$song->id = (int) $_GET['id'];
		echo $song->delete_item();

		header( "location: ?mode=list" );

		break;
}
/* - DELETE CASE (end) - */
}
