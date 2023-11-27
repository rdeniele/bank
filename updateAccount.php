<?php
$conn=mysqli_connect("localhost","root","","bank_db")or die (mysqli_error($conn));
$id=$_GET['id'];
$sql="select * from tblaccountdetail where ID=".$id;
$q=mysqli_query($conn,$sql)or die (mysqli_error($conn));
$r=mysqli_fetch_assoc($q);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
</head>
<body>
    
    <form name="form" method="post" action="updateAccount_confirm.php?id=<?php echo $r['ID'];?>">
    <label for="accNum">Account Number: </label>
    <input type="text" id="accNum" name="accNum"></br>

    <label for="status">Status: </label>
                    <select name="status" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    </select></br>

                   
    <label for="balance">Balance: </label>
    <input type="number" step="any" id="balance" name="balance"></br>

    <button type="submit" id="submit" name="submit">submit</button> 
    
    </form>
    
</body>
</html>