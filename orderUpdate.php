<?php

// Include and create instance of DB class
require_once 'DB.class.php';
$db = new DB();

// Get images id and generate ids array
$idArray = explode(",", $_POST['ids']);

// Update images order
$db->updateOrder($idArray);

?>