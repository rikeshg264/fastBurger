<?php
$hn = 'localhost';
$un = 'fastburger_admin';
$pw = '3bNLW/k(4t4meoEF';
$db = 'fast_burger';

$conn = mysqli_connect($hn, $un, $pw, $db);

if (!$conn)
{
    die('Connection failed: ' . mysqli_connect.error());
}
else {
    echo('Connection is sucessfull');
}