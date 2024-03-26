<?php
function getEstudante($table){
$db= \Config\Database::connect();
return $db->table($table)->countAllResults();
}
?>