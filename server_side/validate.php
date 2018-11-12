<?php
$message = '';
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($cpwd) || empty($number)|| (empty($gender))|| empty($country)) {
        
        $message = '<p class="error">All fields are required </p>';
    }
    else if (strlen($fname) < 3 || strlen($fname) > 20) {
        $message .= '<p class="error">First name must be between 3 and 20 characters</p>';
    }
    else if (strlen($lname) < 3 || strlen($lname) > 20){
    
        $message .= '<p class="error">Last name must be between 3 and 20 characters</p>';
    }
    else if(empty($pwd)) {
        $message .= '<p class="error">Please enter your password</p>';
    }
    else if(empty($cpwd)) {
    $message .= '<p class="error">Please enter your password again</p>';
    }
    else if (!is_numeric($number)) {
        $message .= '<p class="error">Phone number should be numeric</p>';
    }
   else if (strlen($number) != 11) {
    $message .= '<p class="error">Phone number should be 11 digits long</p>';
   }
   else if (empty($gender)){
    $message .= '<p class="error">Please select a gender</p>';
   }
   else if (empty($country)){
    $message .= '<p class="error">Please select a country</p>';
   }
   else {
    $message = '<p class="success">All inputs are valid, thank you</p>';
   }

   
   //header('Location:success.html');
   function saveToDatabase($fname, $lname, $email, $pwd, $cpwd, $number, $gender, $country) {
       $serverName = "localhost";
       $database = "signup_quiz3";
       $username = "root";
       $dpassword = "";
       
       //Open database connection
       $conn = mysqli_connect($serverName, $username, $dpassword, $database);
    
       // Check that connection exists
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }
      
       $sql = "INSERT INTO validate(firstname, lastname, email, pwd, confirm_pwd, phonenumber, gender, country)
              VALUES ('$fname', '$lname', '$email', '$pwd', '$cpwd', '$number', '$gender', '$country')";
       $result = mysqli_query($conn, $sql);
    
       //Check for errors
       if (!$result) {
           die("Error: " . $sql . "<br>" . mysqli_error($conn));
       }
       //Close the connection
       mysqli_close($conn);
    }
    saveToDatabase($fname, $lname, $email, $pwd, $cpwd, $number, $gender, $country);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration form</title>
    <link type="text/css" href="sign-up.css" rel="stylesheet">
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
</style>
	
</head>
<body>
    <form method="post" action="">
        <fieldset>
            <legend>Fill this form:</legend>
            <?php echo $message; ?>
            <label for="firstname">Firstname:</label>
            <input type="text" name="fname" id="firstname">
            <label for="lastname">Lastname:</label>
            <input type="text" name="lname" id="lastname">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="password">Password:</label>
            <input type="password" name="pwd" id="password">
            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpwd" id="cpassword">
            <label for="number">Phone Number:</label>
            <input type="number" name="number" id="number">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender">
                <option value="-1"selected>Choose one</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label for="country">Country:</label>
            <select name="country" id="country">
                <option value="" >Select</option>
                <option value="nigeria">Nigeria</option>
                <option value="ghana">Ghana</option>
                <option value="kenya">Kenya</option>
                <option value="gabon">Gabon</option>
                <option value="zambia">Zambia</option>
            </select>
            <br><br>
                
            <input type="submit" name="submit" value="Submit">
        </fieldset>
    
    </form>
</body>
</html>