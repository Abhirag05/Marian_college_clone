<?PHP

$servername="localhost";
$username="root";
$password="";
$dbname="mariancollege";

session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php"); // Redirect to login page if not logged in
    exit();
}
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed");
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
       
    }
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="marian.css">
    <style>
        body{
            margin: 0;
        }
.head {
display: flex;
margin-left: 95px;
margin-right: 95px;
padding: 10px;
margin-bottom: 0%;
}
header{
    height: 120px;
}
.logo ,.college-name{
margin-top: 20px;

}
.logo img {
width: 50px;
height: 50px;
}

.college-name {
margin-left: 5px;
}

.college-name h3 {
margin: 0;
}

.college-name h5 {
margin: 0;
}
#h{
margin-left: 89px;
}
.head h1{
    text-align: right;
    margin-left: 600px;
}
.image-container img{
        width: 100%;
        height: 220px;
        display: block;
      }
      .image-container {
            position: relative; /* Create a positioning context for the text */
            width: 100%; /* Adjust the width as needed */
            margin-bottom: 0%;
        }
        .image-container .text {
            position: absolute; /* Position text relative to the container */
            top: 50%; /* Position in the middle vertically */
            left: 50%; /* Position in the middle horizontally */
            transform: translate(-50%, -50%); /* Center the text */
            color: white; /* Text color */
            padding: 10px 20px; /* Add padding for better readability */
            font-size: 20px; /* Adjust font size */
            text-align: center; /* Center-align the text */
        }
    footer{
        margin-top: 0%;
    }
   
.logout-link {
    background-color: #0c2d55; /* Dark blue background */
    color: white; /* White text */
    padding: 10px 15px;
    text-decoration: none; /* Remove underline */
    border-radius: 5px; /* Rounded corners */
    font-weight: bold;
    transition: background-color 0.3s ease;
    margin-left: auto; /* Add some spacing from the welcome text */
    width: 50px;
    height:20px;
}

.logout-link:hover {
    background-color: rgb(128, 6, 6); /* Change color on hover */
}

.user-profile{
            max-width: 400px;
            width: 100%;
            background-color: #fff; /* White background */
            color: #333; 
            height: 300px;
             margin-left: 530px;
            margin-top: 100px;
            display: flex; /* Use Flexbox */
            flex-direction: column; /* Stack children vertically */
            align-items: center; /* Center children horizontally */
            justify-content: center; /* Center children vertically */
            border-radius: 8px; /* Slightly more rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .user-profile img{
            border-radius: 100%;
        }
        .user-profile table {
            text-align: left; /* Align text to the left */
            width: 50%;
            border-collapse: collapse; /* Collapse table borders */
            border: none;
        }
      .user-profile th,.user-profile td {
            padding: 10px;
        }

        .body-container {
        text-align: center; /* Center-align all content */
        padding: 20px;
        margin-bottom:100px;
    }

    .body-container h1 {
        font-size: 36px; /* Larger font size */
        color: #0c2d55; /* Marian College's color for the heading */
        margin-top: 20px;
        margin-bottom: 20px;
        font-family: 'Inter', sans-serif;
        text-transform: uppercase; /* Uppercase text */
        letter-spacing: 2px; /* Add spacing between letters */
        position: relative; /* For the underline effect */
    }
    </style>
</head>
<body>
    <header>
        <div class="head">
            <div class="logo">
                <img src="logo1.png" alt="marian-logo">
            </div>
            <div class="college-name">   
                <h3>MARIAN COLLEGE <br> KUTTIKANAM</h3>
                <h5 id="h">AUTONOMOUS</h5>
                <h5 >MAKING COMPLETE</h5>
            </div>
            <h1>Welcome <?PHP echo  $_SESSION["username"]?> </h1>
            <a href="logout.php" class="logout-link">Logout</a>
        </div>
    </header>
    <div class="image-container">
        <img src="background1.jpg" alt="marian">
        <div class="text">
        <h1>User page </h1>
        </div>
    </div>
    <div class="body-container">
    <h1>Welcome to Marian college Kuttikanam <br>Here we Make Complete Everyone</h1>
    <div class="user-profile" id="user-profile">
                <img src="user.avif" alt="admin" width="100px" height="100px">
                <table>
                    <tr><td></td></tr>
                    <tr>
                        <th> Name:</th><td><?PHP echo  $_SESSION["username"]?></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <th>User type:</th><td><?PHP echo  $_SESSION["usertype"]?></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <th> password:</th><td>******</td>
                    </tr>
                </table>
            </div>
    </div>
    
   <footer>
    <div class="footer-name">
        <h2>MARIAN COLLEGE,</h2><h2 id="h">KUTTIKANAM(AUTONOMOUS)</h2>
        <p>
            (+91 -7594971004, +91 - 7594971020)
        </p>
    </div>
    <div class="footer-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.137874605935!2d76.96905737465184!3d9.583381790501777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b064dc8bda5cb29%3A0x3d161914b6967f9!2sMarian%20College%20Kuttikkanam%20(Autonomous)!5e0!3m2!1sen!2sin!4v1739365449264!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="footer-contact">
        <h2>GET IN TOUCH</h2>
        <div class="contact-items">
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>Reception - +91 - 7594971004</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <span>Admissions - +91 - 7594971020</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <span>mariancolege@gmail.com</span>
            </div>
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Kuttikkanam P.O, Peermade, <br>Idukki District, Kerala, India</span>
            </div>
        </div>
    </div>
       
</footer>
<div class="copyright">
    <p>Copyright &copy 2024 All Rights Reserved | ST.Joseph's L.P. School Kuttikanam | Privacy Policy | Terms & Conditions</p>
</div>
</body>
</html>