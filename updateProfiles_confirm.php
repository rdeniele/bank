<?php
$conn = mysqli_connect("localhost", "root", "", "bank_db") or die(mysqli_error($conn));

$id = $_GET['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$city = $_POST['city'];
$address = $_POST['address'];
$contactnum = $_POST['contactnum'];




$sql = "UPDATE tblaccount SET
    FName = '$fname',
    MName = '$mname',
    LName = '$lname',
    Gender = '$lname',
    Bday = '$birthday',
    City = '$city',
    Address = '$address',
    ContactNum = '$contactnum'
WHERE ID = $id;";

$q = mysqli_query($conn, $sql) or die(mysqli_error($conn));

header("location: accountProfiles.php");
?>