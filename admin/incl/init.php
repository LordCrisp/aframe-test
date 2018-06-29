<?php
/*if (session_status() == PHP_SESSION_NONE) {
    session_start();
}*/

/* - DEFINE DOCUMENT ROOT - */
define("DOCROOT", filter_input(INPUT_SERVER, "DOCUMENT_ROOT", FILTER_SANITIZE_STRING)."/");
/* - DEFINE ADMIN ROOT - */
define("ADMINROOT", filter_input(INPUT_SERVER, "DOCUMENT_ROOT", FILTER_SANITIZE_STRING)."/admin/");
/* - DEFINE CORE ROOT - */
define("COREPATH", substr(DOCROOT, 0, strrpos(DOCROOT, "/", -2)) . "/core/");
/* - CLASS AUTOLOADER - */
require_once COREPATH . 'classes/auto_loader.php';
/* - INITIALIZE DATABASE - */
$db = new db_conf();
$auth = new auth();
$auth->authenticate();
// Check if User has CMS access
if (!$auth->user_data['cms_access']) {
	$auth->login_form();
	exit();
}

