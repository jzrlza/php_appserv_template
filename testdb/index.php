<?php

$config = parse_ini_file( dirname(__DIR__) .'\config.ini', true);

$servername = $config['database']['servername'];
$username = $config['database']['username'];
$password = $config['database']['password'];
$dbname = $config['database']['dbname'];

// Create connection


function handleButtonClick() {
    if (isset($_POST["input_username"]) && isset($_POST["input_email"])) {
    	$input_username = htmlspecialchars($_POST["input_username"]);
		$input_email = htmlspecialchars($_POST["input_email"]);

		//echo $input_username . " " . $input_email;


        $conn = new mysqli($servername, $username, $password);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		mysqli_select_db($conn, $dbname);


		$sql = "INSERT INTO users (username, email) VALUES ('$input_username', '$input_email')";

		if ($conn->query($sql) == TRUE) {
		    echo "Data inserted successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
    } else {
        echo "Textbox Value is not set.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_button"])) {
    // Call the function when the button is clicked
    handleButtonClick();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB test</title>
</head>
<body>

<!-- HTML form with a textbox and a button -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="textbox_input">Enter User: </label>
    <input type="text" name="input_username" id="input_username" required>
    <input type="text" name="input_email" id="input_email" required>
    <button type="submit" name="submit_button">Insert</button>
</form>

</body>
</html>