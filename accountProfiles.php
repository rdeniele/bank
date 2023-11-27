<?php

// conn serves as the conncet to the database
$conn=mysqli_connect("localhost","root","","bank_db")or die (mysqli_error($conn));

 if(isset($_POST['val'])&&isset($_POST['val'])){
    $field = $_POST['field'];
    $val = $_POST['val'];
    $sql="select * from tblaccount where $field like '%$val%'";


}
else{
    $sql="select * from tblaccount";
}
$q=mysqli_query($conn,$sql)or die(mysqli_error($conn));
?>

<!-- search bar -->
    <form method="post" action="accountProfiles.php">
        Search:
        <select name="field">
                <option value="FName">First Name</option>
                <option value="MName">Middle Name</option>
                <option value="LName">Last Name</option>
                <option value="Gender">Gender</option>
                <option value="Bday">Birthday</option>
                <option value="City">City</option>
                <option value="Address">Address</option>
                <option value="contactnum">Contact Number</option>
            <input type="text" name="val">
            <input type="submit" name="search" value="Search">
    </form>

    <table border=1>
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Middle Name</td>
            <td>Last Name</td>
            <td>Gender</td>
            <td>Birthday</td>
            <td>City</td>
            <td>Address</td>
            <td>Contact Number</td>
        </tr>

    
        <?php
        //use the names in the database
            while($r=mysqli_fetch_assoc($q)){
               ?>
                <tr>
                    <td><?php echo $r['ID'];?></td>
                    <td><?php echo $r['FName'];?></td>
                    <td><?php echo $r['MName'];?></td>
                    <td><?php echo $r['LName'];?></td>
                    <td><?php echo $r['Gender'];?></td>
                    <td><?php echo $r['Bday'];?></td>
                    <td><?php echo $r['City'];?></td>
                    <td><?php echo $r['Address'];?></td>
                    <td><?php echo $r['ContactNum'];?></td>
                    <td>
                    <a href="addAccount.php?id=<?php echo $r['ID']?>">
                    Add New Account
                    </a>
                    </td>
                    <td>
                    <a href="accountDetails.php?id=<?php echo $r['ID']?>">
                    Show Details
                    </a>
                    </td> 
                    <td>
                    <a href="deleteProfile.php?id=<?php echo $r['ID']?>">
                    Delete
                    </a>
                    </td> 
                    <td>
                    <a href="updateProfiles.php?id=<?php echo $r['ID']?>">
                    Update
                    </a>
                    </td> 
                   

                </tr>
              <?php  
            }
            

        ?>

    </table>


<?php
?>
