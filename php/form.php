$first_name = @$_POST["fname"];
$last_name = @$_POST["lname"];
$birth_date = @$_POST["birth_date"];
$mail = @$_POST["email"];
$phone = @$_POST["phone"];
$pwd = @$_POST["password"];
$sex = @$_POST["sex"];
$city = @$_POST["city"];
$country = @$_POST["country"];
$zipcode = @$_POST["zipcode"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "divadloapollon";

$conn = new mysqli($servername, $username, $password , $dbname);
if($conn->connect_error){
echo "$conn->connect_error";
die("Connection Failed : ". $conn->connect_error);
} else {
$stmt = $conn->prepare("insert into registration(first_name, last_name, birth_date, mail, phone, pwd, sex, city, country, zipcode) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisissssi", $first_name, $last_name, $birth_date, $mail, $phone, $pwd, $sex, $city, $country, $zipcode,);
$execval = $stmt->execute();
echo $execval;
echo "Registration successfully...";
$stmt->close();
$conn->close();
}
?>