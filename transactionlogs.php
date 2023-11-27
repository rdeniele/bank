<?php
$conn = mysqli_connect("localhost", "root", "", "bank_db") or die(mysqli_error($conn));
$sql = "select * from tblaccount";
$q = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$r = mysqli_fetch_assoc($q)
?>

First Name: <?php echo $r['FName']; ?>    
<br>
Middle Name: <?php echo $r['MName']; ?>    
<br>
Last Name: <?php echo $r['LName']; ?>   
<br>

<?php
$conn2 = mysqli_connect("localhost", "root", "", "bank_db") or die(mysqli_error($conn2));
$sql2 = "select * from tblaccountdetail";
$q2 = mysqli_query($conn2, $sql2) or die(mysqli_error($conn2));
$r2 = mysqli_fetch_assoc($q2)
?>
Account Number: <?php echo $r2['AccNum']; ?>   
<br>
Balance: <?php echo $r2['Balance']; ?>   

<?php
// Use a single connection
$conn3 = mysqli_connect("localhost", "root", "", "bank_db") or die(mysqli_error($conn3));

$sql3 = "";  // Initialize the $sql3 variable

if (isset($_POST['val']) && isset($_POST['val'])) {
    $field = $_POST['field'];
    $val = $_POST['val'];

    // You might want to specify which table you want to search
    if ($field === 'AccNum') {
        $sql3 = "select * from tblaccountdetail where $field like '%$val%'";
    } else {
        $sql3 = "select * from tbltransaction where $field like '%$val%'";
    }
}

// Default query if no search parameters
if (empty($sql3)) {
    $sql3 = "select * from tbltransaction";
}

$q = mysqli_query($conn3, $sql3) or die(mysqli_error($conn3));
?>

<!-- search bar -->
<form method="post" action="transactionlogs.php">
    Search:
    <select name="field">
        <option value="tType">Transaction Type</option>
        <option value="Amount">Amount</option>
        <option value="TDate">Transaction Date</option>
    </select>
    <input type="text" name="val">
    <input type="submit" name="search" value="Search">
</form>

<table border=1>
    <tr>
        <td>ID</td>
        <td>Account Number</td>
        <td>Transaction Type</td>
        <td>Amount</td>
        <td>Transaction Date</td>
        <td>New Balance</td>
    </tr>

    <?php
    while ($r = mysqli_fetch_assoc($q)) {
        ?>
        <tr>
            <td><?php echo $r['ID']; ?></td>
            <td><?php echo $r2['AccNum']; ?></td>
            <td><?php echo $r['TType']; ?></td>
            <td><?php echo $r['Amount']; ?></td>
            <td><?php echo $r['TDate']; ?></td>
            <td><?php echo $r['NBalance']; ?></td>
            <td>
                <a href="deleteTransaction.php?id=<?php echo $r['ID'] ?>">
                    Delete
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<?php
?>
<a href="index.php">home</a>
