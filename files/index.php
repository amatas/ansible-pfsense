<?php                                                                            
if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") return;                              
$file = strtolower(preg_replace("/[^a-z0-9\-\_]+/i", "", $_GET['file'])).'.inc'; 
if (file_exists($file))                                                                               
   readfile($file);                                                              
?>
