<?php
$databaseName = 'EFLYNN10_final';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'eflynn10_writer';
$password = 'Zq6%b,L2covX-Qe7<i6V';

$pdo = new PDO($dsn, $username, $password);
if($pdo) print '<!-- Connection complete-->';
?>