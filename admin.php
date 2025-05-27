<?PHP

$servername="localhost";
$username="root";
$password="";
$dbname="mariancollege";

session_start();
    $conn=new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed");
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $updated_news=$_POST['news'];
        $sql=("UPDATE mariannews SET marian_news='".$updated_news."' where news_id='1'");
        if($conn->query($sql)==TRUE){
            echo "<script>alert('Updated successfully')</script>";
        }
        else{
            echo"Update failed";
        }
    }
     // Fetch messages from the contact table
$fetch_sql = "SELECT * FROM contact";
$result = $conn->query($fetch_sql);
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
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
    .sidebar {
            width: 250px;
            background-color: #0c2d55;
            color: white;
            height: 400px;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            left: 0;
            top: 0;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .sidebar .admin {
            padding: 15px 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sidebar .admin h1 {
            font-size: 18px;
            margin: 0;
        }

        .sidebar .admin:hover {
            background-color:rgb(128, 6, 6);
        }
        .admin-profile{
            max-width: 400px;
            width: 100%;
            background-color: #fff; /* White background */
            color: #333; 
            height: 300px;
             margin-left: 330px;
            margin-top: 100px;
            display: flex; /* Use Flexbox */
            flex-direction: column; /* Stack children vertically */
            align-items: center; /* Center children horizontally */
            justify-content: center; /* Center children vertically */
            border-radius: 8px; /* Slightly more rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .admin-profile img{
            border-radius: 100%;
        }
        .admin-profile table {
            text-align: left; /* Align text to the left */
            width: 50%;
            border-collapse: collapse; /* Collapse table borders */
            border: none;
        }
      .admin-profile th,.admin-profile td {
            padding: 10px;
        }
        .body-container {
            display: flex; /* Use Flexbox to align sidebar and admin-profile horizontally */
        }
        .update-form {
    max-width: 500px;
    background-color: #fff; /* White background */
    color: #333; /* Dark gray text */
    height: auto; /* Allow height to adjust to content */
    margin: 100px auto; /* Center horizontally, add top/bottom margin */
    padding: 20px;
    border-radius: 8px; /* Slightly more rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    width: 100%;
}

.update-form h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #0c2d55; /* Marian College's color for the heading */
}

.update-form textarea {
    width: calc(100% - 22px);  /* Full width minus padding */
    height: 120px; /* Increased height */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
    font-family: sans-serif; /* Consistent font */
    box-sizing: border-box; /* Include padding in width calculation */
    resize: vertical; /* Allow vertical resizing only */
}

.update-form input[type="submit"] {
    background-color: #0c2d55;
    color: white;
    padding: 12px 25px; /* Slightly larger button */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-weight: bold; /* Make the button text bolder */
    width: auto; /* Adjust width to fit content */
    margin: 0 auto; /* Center the button */
    display: block; /* Makes margin: 0 auto work */
}

.update-form input[type="submit"]:hover {
    background-color: rgb(128, 6, 6);
}

/* Optional: Add some spacing between form elements */
.update-form > * {
    margin-bottom: 10px; /* Space between all direct children of .update-form */
}
.view-message{
    max-width: 800px;
    background-color: #fff; /* White background */
    color: #333; /* Dark gray text */
    height: auto; /* Allow height to adjust to content */
    margin: 100px auto; /* Center horizontally, add top/bottom margin */
    padding: 20px;
    border-radius: 8px; /* Slightly more rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    width: 100%;
}
.view-message h1{
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #0c2d55; /* Marian College's color for the heading */
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


.message-container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
    }

    .message-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .message-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .message-card h3 {
        margin: 0 0 10px;
        font-size: 20px;
        color: #0c2d55;
    }

    .message-card p {
        margin: 5px 0;
        font-size: 16px;
        color: #555;
    }

    .message-card p strong {
        color: #333;
    }

    .no-messages {
        text-align: center;
        font-size: 18px;
        color: #777;
    }
    </style>
</head>
<body>
    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.getElementById('admin-profile').style.display = 'none';
            document.getElementById('view-message').style.display = 'none';
            document.getElementById('update-form').style.display = 'none';

            if (sectionId === 'admin-profile') {
        document.getElementById(sectionId).style.display = 'flex'; // Use 'flex' ONLY for admin-profile
    } else {
        document.getElementById(sectionId).style.display = 'block'; // Use 'block' for other sections
    }
        }
    </script>
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
        <h1>Admin page </h1>
        </div>
    </div>
    <div class="body-container">
        <div class="sidebar">
            <div class="admin" onclick="showSection('admin-profile')"><h1>Admin Profile</h1>  </div>
            <div class="admin" onclick="showSection('view-message')"><h1>View Message</h1>  </div>
            <div class="admin" onclick="showSection('update-form')">  <h1>Update News</h1></div>
                <div class="admin">
                    <h1>Manage students</h1>
                </div>
                <div class="admin">
                    <h1>Manage Staffs</h1>
                </div>
                <div class="admin">
                    <h1>Manage Gallery</h1>
                </div>
                <div class="admin">
                    <h1>fee management</h1>
                </div>
            </div>
            <div class="admin-profile" id="admin-profile">
                <img src="admin.png" alt="admin" width="100px" height="100px">
                <table>
                    <tr><td></td></tr>
                    <tr>
                        <th> Name:</th><td><?PHP echo  $_SESSION["username"]?></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <th>User type:</th><td>Admin</td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <th> password:</th><td>23ubc102</td>
                    </tr>
                </table>
            </div>
            <div class="view-message" id="view-message" style="display: none;"> 
                <h1>Messages</h1>
                <div class="message-container">
        <?php if (!empty($messages)) : ?>
            <?php foreach ($messages as $message) : ?>
                <div class="message-card">
                    <h3><?php echo htmlspecialchars($message['name']); ?></h3>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($message['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($message['phone_no']); ?></p>
                    <p><strong>Message:</strong> <?php echo htmlspecialchars($message['message']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="no-messages">No messages found.</p>
        <?php endif; ?>
    </div>
                
            </div>
            <div class="update-form" id="update-form" style="display: none;">
                <h1>News Form</h1>
                <form action="" method="post">
                    <textarea name="news" id="news" placeholder="Enter the updated news"></textarea>
                    <input type="submit" value="Submit" name="sumbit">
                </form>
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