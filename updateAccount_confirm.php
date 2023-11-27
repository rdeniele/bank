<?php
$conn = mysqli_connect("localhost", "root", "", "bank_db") or die(mysqli_error($conn));

$id = $_GET['id'];
$accNum = $_POST['accNum'];
$balance = $_POST['balance'];
$status = $_POST['status'];
$dateclosed = "0000-00-00";

if ($status == 'inactive') {
    $dateclosed = date('Y-m-d');
    $status = 'inactive';
}

$sql = "UPDATE tblaccountdetail SET
    AccNum = '$accNum',
    Balance = '$balance',
    DateClosed = '$dateclosed',
    Status = '$status'
WHERE ID = $id;";

$q = mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("location: accountDetails.php");
?>