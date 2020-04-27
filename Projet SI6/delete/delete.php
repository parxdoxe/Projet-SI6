<?php
include('../class/bd.php');

$DB->insert('DELETE FROM membres WHERE id = ?')->execute(array($_GET['id']));
header('Location:  ../index.php');
exit;

?>