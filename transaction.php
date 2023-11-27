
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "bank_db");

// Initialize $r with default values
$r = ['ID' => '', 'TType' => '', 'Amount' => '', 'TDate' => ''];

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data based on the provided ID
    $sql = "SELECT * FROM tblaccountdetail WHERE ID = $id";
    $result = mysqli_query($conn, $sql);

    // Check if a user was found
    if ($result && mysqli_num_rows($result) > 0) {
        $r = mysqli_fetch_assoc($result);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw</title>
</head>
<body>
    
    <form name="form" method="post" action="transaction_confirm.php?id=<?php echo $r['ID'];?>">
    <label for="balance">Balance: </label>
    <p> <?php echo $r['Balance'];?></p>

    
    <label for="ttype">Transaction Type: </label></br>
    <input type="radio" id="withdraw" name="ttype" value="withdraw"> Withdraw
    <input type="radio" id="deposit" name="ttype" value="deposit"> Deposit </br>

    <label for="amount">Enter Amount: </label>
    <input type="text" id="amount" name="amount"></br>

</br>
    <button type="add" id="add" name="add">Submit</button> 
    </form>

    <a href="index.php">home</a>
</body>
</html>
