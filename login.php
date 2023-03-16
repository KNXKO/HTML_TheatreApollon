<html>
<head>
<style>
.errorColor {color: #D30000;}
</style>
</head>
<body>  
<?php
// all required variables defined here
$nameError = $emailError = "";
$name = $email = $message = $submited = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameError = "Name is mandatory";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameError = "Only letters allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailError = "Email is mandatory";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
  }
    
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
 
  $submited = test_input($_POST["submited"]);
}

function test_input($data) {
  $data = trim($data);   
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

  $servername = "sql4.webzdarma.cz";
  $username = "divadloapoll3574";
  $password = "-6SR@c9ywB%%h@5*99^4";
  $dbname = "divadloapoll3574";
  
  // I am Creating a connection here with MySQL.
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // I am Checking connection here. 
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
  // SQL query to inserting data in students table.

  $sql = "INSERT INTO user (first_name, last_name, mail)
  VALUES ('$first_name', '$last_name', '$mail')";
  
 (mysqli_query($conn, $sql)); 
    
  mysqli_close($conn);
  
?>

<!-- Creating a Form -->
<h2><u>PHP Form With Validation</u></h2>
<p><span class="errorColor">* mandatory field</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  Name: <input type="text" name="name">
  <span class="errorColor">* <?php echo $nameError;?></span>
  <br><br>
  
  E-mail: <input type="text" name="email">
  <span class="errorColor">* <?php echo $emailError;?></span>
  <br><br>
  
  Message: <textarea name="message" rows="6" cols="24"></textarea>
  <br><br>
  
<input type="hidden" name="submited" value="Message sent successfully"> 
<input type="submit" name="submit" value="Submit">  
</form>
<?php
if ($nameError =="Name is mandatory"){
echo "Error";
}else{
echo $submited; 
}
?>
</body>
</html>