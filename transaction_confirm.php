<?php

$conn = mysqli_connect("localhost", "root", "", "bank_db") or die(mysqli_error($conn));


$id = $_GET['id'];


$sql = "SELECT Balance FROM tblaccountdetail WHERE ID = $id";
$q = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($q);
$balance = $r['Balance'];


// Check if the `ttype` key exists in the `$_POST` array
if (isset($_POST['ttype'])) {
  $ttype = $_POST['ttype'];
} else {
  // If the `ttype` key does not exist, set it to an empty string
  $ttype = '';
}

$amount = $_POST['amount'];
$tdate = date('Y-m-d');

$newBalance = 0;
if ($ttype == 'withdraw') {
  $newBalance = $balance - $amount;
  $ttype2 = "withdraw";
} else if($ttype == 'deposit'){
  $newBalance = $balance + $amount;
  $ttype2 = "deposit";
}


$sql = "INSERT INTO tbltransaction (AcctID, TType, Amount, TDate, NBalance) 
VALUES ('$id', '$ttype2', '$amount', '$tdate', '$newBalance')";
$q = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$sql = "UPDATE tblaccountdetail SET Balance=$newBalance where ID='$id'";
$q = mysqli_query($conn, $sql) or die(mysqli_error($conn));


header("location: transactionlogs.php");
?>
