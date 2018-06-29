<?php
require_once 'incl/init.php';
/** -- MODE SET AREA
 * Look in GET for mode, then in POST if not set and set til "list" if it isn't set anywhere
 */
$mode = filter_input(INPUT_POST, "mode", FILTER_SANITIZE_STRING);
if (empty($mode)) {
	$mode = filter_input(INPUT_GET, "mode", FILTER_SANITIZE_STRING);
}
if (empty($mode)) {
	$mode = "list";
}
$mode = strtoupper($mode);

//Site Area
$pageTitle = "Produkt";
//Site URL
$pageUrl = "products.php";
// Site Content
$page_content = "product";
//Set ID from GET variable
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
//Site Section
switch ($mode) {
	default:
	case "LIST":        $pageSection = "Liste";                                 break;
	case "DETAILS":     $pageSection = "Detaljer";                              break;
	case "EDIT":		$pageSection = $id>0 ? "Redigering": "Oprettelse";		break;
}


// -- Include Header if page with HTML
if (!($mode == "SAVE" || $mode == "DELETE" || $mode == "EDIT" && $auth->user_data["edit_$page_content"] == 0)) {
		require_once ADMINROOT . 'incl/header.php';
}

switch ($mode) {

	/* -----------------------------------------------------------------------------------------
	/* - LIST CASE (start) - */
	default:
	case "LIST":
		echo "<section class='list'>
            <table class='table'>
                <thead>
                    <tr>
                        <th></th>
                        <th>Produkt</th>
                        <th>Pris</th>
                        <th>Kategori</th>
                    </tr>
                </thead>";

		/* Call Item Class */
		$product = new crud($page_content);
		/* Ask Class for a list (method) & loop it*/
		foreach ($product->list_all(1) as $key => $arrValues) {
			echo "<tr>
                    <td>
                        <a href='?mode=details&id=$arrValues[id]'><i class='material-icons'>remove_red_eye</i></a>
                        ";
			if ($auth->user_data["edit_$page_content"]) {
				echo    "<a href='?mode=edit&id=$arrValues[id]'><i class='material-icons'>mode_edit</i></a>
                        <a href='?mode=delete&id=$arrValues[id]'><i class='material-icons'>delete</i></a>";
			}

            echo    "</td>
                    <td><a href='?mode=details&id=$arrValues[id]'>$arrValues[name]</a></td>
                    <td>$arrValues[price]kr</td>
                  </tr>";
		}
	echo "</table></section>";

	break;
	/* - LIST CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - DETAILS CASE (start) - */
	case "DETAILS":
		/* Call Item Class */
		$product = new product();
		/* Ask Class for a specific item */
		$item = $product->get_item($id);
		echo "<section class='details'>
                <h2>$item[name]</h2>
                <img src='<?= DOCROOT ?>/assets/img/products/$item[img_name]'>
                <h4>$item[price]</h4>
                <a href='?mode=delete&id=$id'><i class='material-icons'>delete</i></a>
                <p>$item[description]</p>
             </section>";


		break;
	/* - DETAILS CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - EDIT CASE (start) - */
	case "EDIT":

		$form = new html_helper($page_content);
		$form->form_presenter($id);

		break;

	/* - EDIT CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - SAVE CASE (start) - */
	case "SAVE":
		$crud = new crud($page_content);
		/* -- INSERT IMG FILE UPLOAD HERE -- */
		$id = $crud->save_item(0, 'image', 0,'assets/img/products');

		header("location: ?mode=details&id=$id");

		break;
	/* - SAVE CASE (end) - */
	/* -----------------------------------------------------------------------------------------
	/* - DELETE CASE (start) - */
	case "DELETE":

		$product = new product();
		$product->id = (int) $_GET['id'];
		echo $product->delete_item();

		header("location: ?mode=list");

		break;
}
/* - DELETE CASE (end) - */

// Don't need If statement, it won't reach here if it doesn't need the footer
require_once ADMINROOT . 'incl/footer.php';

