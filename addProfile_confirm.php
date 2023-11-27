<?php
    $conn=mysqli_connect("localhost","root","","bank_db")or die (mysqli_error($conn));

    if(isset($_POST['add'])){
    
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'] ;
    $gender= $_POST['gender'] ;
    $birthday= $_POST['birthday'];
    $city= $_POST['city'];
    $address= $_POST['address'];
    $contactnum= $_POST['contactnum'];
    
    $sql="insert into tblaccount(FName,MName ,LName, Gender,Bday, City,Address,Contactnum) 
    values('$fname','$mname','$lname', '$gender','$birthday', '$city','$address','$contactnum')";
    $q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
    header("location: accountProfiles.php");
    } 
    

    


?>
