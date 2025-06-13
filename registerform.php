<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mariancollege";

session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = "user";

    // Check if the username already exists
    $sql = "SELECT * FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.');</script>";
    } else {
        // Insert new user into the login table
        $insert_sql = "INSERT INTO login (username, password, usertype) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sss", $username, $password, $usertype);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Redirecting to login page.'); window.location.href='marianlogin.php';</script>";
        } else {
            echo "<script>alert('Error in registration. Please try again.');</script>";
        }
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <style>
        .container {
            background-color: white;
            max-width: 340px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
            text-align: center;
        }
        .container img{
            margin-bottom: 50px;
        }
        body {
        background-image: url('Marian_College_Kuttikkanam.jpg');
        background-position: center; /* Center the image horizontally and vertically */
        background-repeat: no-repeat; /* Prevent the image from repeating */
        background-size: cover; /* Ensure the image covers the entire viewport */
        margin: 0; /* Remove default margin */
        height: 100vh; /* Ensure the body takes up the full height of the viewport */
     }

    input[type="text"],input[type="password"]{
        width: 95%; /* Makes input box take the full width of the container */
        padding: 9px; /* Adjusts the padding inside the input box */
        box-sizing: border-box; /* Ensures padding and border are included in the width */
        font-size: 14px; /* Increases the font size inside the input box */
        border: 1px solid #ccc; /* Adds a border around the input box */
        border-radius: 4px;
    }
    input[type="submit"]{
        width: 95%; 
        padding: 14px;
        box-sizing: border-box;
        font-size: 14px; /* Increases the font size inside the input box */
        border: 1px solid #ccc; /* Adds a border around the input box */
        border-radius: 4px;
        background-color: #1984c9;
        border-color: #177bbb;
        color: white;
    }
    a{
        color: rgb(106, 105, 105);
    }
    
    </style>
    
</head>
<body>
    <div class="container">
        <h1>Register Here</h1>
        <form action="" method="POST">
            <img src="logo.png" alt="logo" width="200px" height="100px">
            <br>
            <input type="text" placeholder="username/Register no" id="username" name="username" required> <br> <br>
            <input type="password" placeholder="Password" id="password" name="password" required> <br> <br> <br>
            <input type="submit" value="Register" id="signInBtn"> <br> <br>
            <a href="marianlogin.php">Already have an account?</a>
        </form>
    </div>
    <script>
        // JavaScript for form validation and redirection
        document.getElementById("signInBtn").addEventListener("click", function () {
            // Get the values of the input fields
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            // Validate the input fields
            if (username === "") {
                alert("Please enter your username/register number.");
                return false;
            }
            if (password === "") {
                alert("Please enter your password.");
                return false;
            }
                return true;
            // If validation passes, redirect to home.html
            window.location.href = "";
        });
    </script>
</body>
</html>