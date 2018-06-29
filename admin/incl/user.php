<?php
require_once '../incl/init.php';

$mode = filter_input(INPUT_POST, "mode", FILTER_SANITIZE_STRING);
if (empty($mode)) {
    $mode = filter_input(INPUT_GET, "mode", FILTER_SANITIZE_STRING);
}
if (empty($mode)) {
    $mode = "list";
}

//Site Area
$pageTitle = "User";
//Site Section
$pageSection = "";
switch (strtoupper($mode)) {

    /* ------------------------------------------------------------------------
    /* - LIST CASE (start) - */

    case "LIST":
        $pageSection = "List";
        require_once DOCROOT . '/incl/header.php';

        $user = new user();
        $columns = [
            'user_name' => 'Bruger Navn',
            'user_type' => 'Bruger Type',
            'email' => 'Email'
        ];

        $list_presenter = new list_presenter($columns, $user->list_all());
        $list_presenter -> present_list(1, 1, 1);


        require_once DOCROOT . '/incl/footer.php';
        echo "</table></div>";
        break;

    /* - LIST CASE (end) - */
    /* ------------------------------------------------------------------------
    /* - DETAILS CASE (start) - */

    case "DETAILS":
        $pageSection = "Details";
        require_once DOCROOT . '/incl/header.php';

        $id = (int)$_GET['id'];

        /* Call User Class */
        $user = new user();
        /* Ask Class for a specific item */
        $user->get_item($id);

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
                <pre>$user->email</pre>
             </div>";


        require_once DOCROOT . '/incl/footer.php';
        break;

    /* - DETAILS CASE (end) - */
    /* ------------------------------------------------------------------------
    /* - EDIT CASE (start) - */

    case "EDIT":


        //One line IF statement, IF $_POST[id] is set, check it's an INT, ELSE set it to 0
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        /* Check if it an Edit or Create case, and fetch data if edit */
        if ($id>0) {
            $submit_button = "Opdater Bruger";
            $pageSection = "Update";
        }
        else {
            $submit_button = "Opret Bruger";
            $pageSection = "Create";
        }

        require_once DOCROOT . '/incl/header.php';

        echo "<div class='container'>
                <a href='?mode=list'><h6>Back To List</h6></a>";
        if($id) {
            echo "<a href='?mode=details&id=$id'><h6>Back To Details</h6></a>";
        }
        echo "</div>
            <hr>            
            <div class='container'>";

        /* Creation & Update Form */
        $user = new user();
        $form_presenter = new form_presenter($user->arr_labels, $user->arr_form_types, $user->get_item($id,1));




        $form_presenter->select_box('gender', 'Vælg Køn');
        $form_presenter->form_presenter($submit_button);

        echo "</div>";
        require DOCROOT . "/incl/footer.php";
        break;

    /* - EDIT CASE (end) - */
    /* ------------------------------------------------------------------------
    /* - SAVE CASE (start) - */

    case "SAVE":
        $user = new user();
        foreach ($user->arr_form_types as $fieldname => $array_fieldinfo) {

            try {
                /* Sætter class property hvis den eksisterer i post var */
                if ($array_fieldinfo[0] == "date" || "datetime") {
                    echo $array_fieldinfo[0];
                    $user->$fieldname = date::make_timestamp($fieldname);
                    echo $user->$fieldname ."<br>";
                }
                else {
                    $user->$fieldname = filter_input(INPUT_POST, $fieldname, $array_fieldinfo[1]);
                }

            } catch (Exception $e) {
                /* Melder fejl */
                echo "Fejl: " . $e->getMessage();
            }
        }


        /*$user->id = (int) $_POST['id'];
        $user->user_name = $_POST['user_name'];
        $user->email = $_POST['email'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->address = $_POST['address'];
        $user->country = $_POST['country'];
        $user->zipcode = $_POST['zipcode'];
        $user->phone = $_POST['phone'];
        $user->birthdate = date::make_timestamp('birthdate');
        $user->gender = $_POST['gender'];*/
        $id = $user->admin_save_user();

        header("location: ?mode=details&id=$id");

        break;

    /* - SAVE CASE (end) - */
    /* ------------------------------------------------------------------------
    /* - DELETE CASE (start) - */

    case "DELETE":

        $user = new user();
        $user->id = (int) $_GET['id'];
        echo $user->delete_item();

        header("location: ?mode=list");

        break;
}
    /* - DELETE CASE (end) - */
