<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Account Registration</title>
</head>
<body>
    <section>
        <div class="boxbox">
        <div class="container">
            <div class="regdiv"><h1 id="regheader">Account Registration</h1></div>

            <form name="form" method="post" action="addProfile_confirm.php">
                <label for="fname">First name:</label>
                <input type="text" name="fname" value=""><br>
                
                <label for="mname">Middle name:</label>
                <input type="text" name="mname" value=""><br>

                <label for="lname">Last name:</label>
                <input type="text" name="lname" value=""><br>

                <label for="gender">Gender: </label> </br>
                    <label for="gender"> Male: </label>
                    <input type="radio" id="gender1" name="gender" value="Male">

                    <label for="gender"> Female: </label>
                    <input type="radio" id="gender2" name="gender" value="Female">
                    </br> 
                <label for="birthday">Birthday: </label>
                <input type="date" id="birthday" name="birthday"></br>
                
                <label for="city">City: </label>
                    <select name="city" id="city">
                    <option value="Bacolod">Bacolod</option>
                    <option value="Cebu">Cebu</option>
                    <option value="Manila">Manila</option>
                    <option value="Quezon">Quezon</option>
                    <option value="Other">other</option>
                    </select></br>

                <label for="address">Address: </label>
                <input type="text" name="address" value=""><br>

                <label for="contactnum">Contact Number: </label>
                <input type="text" name="contactnum" value=""><br>

                <button type="add" id="addbutton2" name="add">Add</button> 
            </form>
        </div>
</div>
    </section>   




</body>
</html>