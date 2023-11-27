<?php

// conn serves as the conncet to the database
$conn=mysqli_connect("localhost","root","","bank_db")or die (mysqli_error($conn));

 if(isset($_POST['val'])&&isset($_POST['val'])){
    $field = $_POST['field'];
    $val = $_POST['val'];
    $sql="select * from tblaccountdetail where $field like '%$val%'";


}
else{
    $sql="select * from tblaccountdetail";
}
$q=mysqli_query($conn,$sql)or die(mysqli_error($conn));
?>

<!-- search bar -->
    <form method="post" action="accountProfiles.php">
        Search:
        <select name="field">
                <option value="AccNum">Account ID</option>
                <option value="AccNum">Account Number</option>
                <option value="DateOpened">Balance</option>
                <option value="DateOpened">Date Opened</option>
                <option value="DateOpened">Date Closed</option>
                <option value="DateOpened">Status</option>
                
            <input type="text" name="val">
            <input type="submit" name="search" value="Search">
    </form>

    <table border=1>
        <tr>
            <td>ID</td>
            <td>Account ID</td>
            <td>Account Number</td>
            <td>Balance</td>
            <td>Date Opened</td>
            <td>Date Closed</td>
            <td>Status</td>
        </tr>

    
        <?php
        //use the names in the database
            while($r=mysqli_fetch_assoc($q)){
               ?>
                <tr>
                    <td><?php echo $r['ID'];?></td>
                    <td><?php echo $r['AcctID'];?></td>
                    <td><?php echo $r['AccNum'];?></td>
                    <td><?php echo $r['Balance'];?></td>
                    <td><?php echo $r['DateOpened'];?></td>
                    <td><?php echo $r['DateClosed'];?></td>
                    <td><?php echo $r['Status'];?></td>
                  
                    <td>
                    <a href="transaction.php?id=<?php echo $r['ID']?>">
                   Transact
                    </a>
                    </td>
                    <td>
                    <a href="updateAccount.php?id=<?php echo $r['ID']?>">
                    Update
                    </a>
                    </td>
                    <td>
                    <a href="deleteAccount.php?id=<?php echo $r['ID']?>">
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
