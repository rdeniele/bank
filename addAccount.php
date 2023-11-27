
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "bank_db");

// Initialize $r with default values
$r = ['ID' => '', 'AccountNumber' => '', 'DateOpened' => '', 'Balance' => ''];

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data based on the provided ID
    $sql = "SELECT * FROM tblaccount WHERE ID = $id";
    $result = mysqli_query($conn, $sql);

    // Check if a user was found
    if ($result && mysqli_num_rows($result) > 0) {
        $r = mysqli_fetch_assoc($result);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account</title>
</head>
<body>
    
    <form name="form" method="post" action="addAccount_confirm.php?id=<?php echo $r['ID'];?>">
    <label for="accNum">Account Number: </label>
    <input type="text" id="accNum" name="accNum"></br>

    <label for="dateOpened">Date Opened: </label>
    <input type="date" id="dateOpened" name="dateOpened"></br>

    <label for="balance">Balance: </label>
    <input type="number" step="any" id="balance" name="balance"></br>

    <button type="add" id="add" name="add">Home</button> 
    
    </form>
    
</body>
</html>

