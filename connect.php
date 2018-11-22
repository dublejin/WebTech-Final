<?php
$connect=mysqli_connect('localhost','root','','products');
 
if(mysqli_connect_errno($connect))
{
 echo 'Failed to connect';
}
 
?>