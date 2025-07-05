<?php
// LFI → executes any PHP in the target file
$file = isset($_GET['file']) ? $_GET['file'] : '';
if (!$file) {
    die('No file specified');
}
include $file;
?>
