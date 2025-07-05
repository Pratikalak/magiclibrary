<?php
$file = $_GET['file'] ?? '';
if(!$file) exit('No file');
include $file;
?>
