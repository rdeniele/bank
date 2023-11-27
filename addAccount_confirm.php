 <?php
    $conn=mysqli_connect("localhost","root","","bank_db") or die (mysqli_error($conn));
    
    $id=$_GET['id'];
    //$last_id=mysqli_insert_id($conn);
    $accNum=$_POST['accNum'];
    $balance=$_POST['balance'];
    $dateOpened=$_POST['dateOpened'];
    $status="ACTIVE";
  
    
    $sql = "insert into tblaccountdetail (AcctID, AccNum, Balance, DateOpened, Status) 
    values ('$id','$accNum', '$balance','$dateOpened','$status')";
    $q = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
   
    header("location: accountDetails.php");
    
?> 

