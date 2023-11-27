<?php
//connect to the db
$conn=mysqli_connect("localhost", "root","","bank_db") or die (mysqli_error($conn));
$id=$_GET['id'];
$sql="delete from tbltransaction where ID=$id";
$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));

header("location:transactionlogs.php");

?>