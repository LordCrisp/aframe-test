<?php
    $pageTitle = "Forside";
    require "incl/init.php";
    require ADMINROOT . "incl/header.php";
?>

    <p>Her skal være ting man kan lave om, som titel, adresse osv.</p>


<?php
var_dump(session_id());
var_dump($auth->user_name);
var_dump($auth->user_id);
var_dump($auth->user_data);
require_once ADMINROOT . "incl/footer.php"?>