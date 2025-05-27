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
        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $message=$_POST['message'];
        $sql="INSERT INTO contact(name,email,phone_no,message) values('$name','$email','$number','$message')";
        if($conn->query($sql)==TRUE){
            echo "<script>alert('Submitted successfully')</script>";
        }
        else{
            echo"<script>alert('Submittion failed')</script>";
        }

        
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="marian.css">
    <style>
         .image-container img{
        width: 100%;
        height: 220px;
        display: block;
      }
      .image-container {
            position: relative; /* Create a positioning context for the text */
            width: 100%; /* Adjust the width as needed */
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
    .contact-form {
    max-width: 600px;
    margin: 50px auto; /* Centers the form */
    padding: 20px;
    background: #fff;
   
    border-radius: 8px;
    text-align: center;
}

.contact-form h1 {
    margin-bottom: 20px;
    font-size: 30px;
    color:#0c2d55;
    text-align: left;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    height: 30px;
}

.contact-form textarea {
    height: 100px;
    resize: none;
}

.contact-form input[type="submit"] {
    background:#0c2d55 ; /* Professional red color */
    color: white;
    border: none;
    cursor: pointer;
    font-size: 18px;
    padding: 10px;
    transition: 0.3s;
    width: 150px;
    border-radius: 0%;
    height: auto;
}

.contact-form input[type="submit"]:hover {
    background: #b71c1c;
}

    </style>
</head>
<body>
<script>
        function validateForm() {
            // Get form inputs
            let name = document.getElementById('name').value.trim();
            let email = document.getElementById('email').value.trim();
            let number = document.getElementById('number').value.trim();
            let message = document.getElementById('message').value.trim();

            // Validate Name
            if (name === "") {
                alert("Please enter your name.");
                return false;
            }

            // Validate Email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate Mobile Number
            const numberPattern = /^\+?\d{10,15}$/; // Allows optional + and 10-15 digits
            if (!numberPattern.test(number)) {
                alert("Please enter a valid mobile number with country code.");
                return false;
            }

            // Validate Message
            if (message === "") {
                alert("Please enter your message.");
                return false;
            }

            // If all validations pass
            return true;
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
        </div>
            <div class="nav1">
                 <nav>
                    <ul>
                        <li><a href="#Research" target="_blank">RESEARCH</a></li>
                        <li><a href="IQAC" target="_blank">IQAC</a></li>
                        <li><a href="#services" target="_blank">RANKING</a></li>
                        <li><a href="#contact" target="_blank">PLACEMENT</a></li>
                        <li><a href="#home" target="_blank">ALUMNI</a></li>
                        <li><a href="#about" target="_blank">GALLERY</a></li>
                        <li><a href="#services" target="_blank">QUICK LINKS</a></li>
                        <li><a href="contact.php" target="_blank">CONTACT US</a></li>
                        <li><a href="registerform.php" target="_blank">LOGIN</a></li>
                    </ul>
                </nav>
            </div>
            <div class="nav2">
                <nav>
                   <ul>
                       <li><a href="home.PHP"  target="_blank">HOME</a></li>
                       <li><a href="aboutus.html"  target="_blank">ABOUT US</a></li>
                       <li>
                        <a href="">ACADEMICS</a>
                        <ul class="dropdown">
                            <li><a href="" >Department of Economics</a></li>
                            <li><a href="" >Department of Communication and Media Studies</a></li>
                            <li><a href="" >Department of Hospitality and Tourism Management</a></li>
                            <li><a href="" >Department of English / Languages</a></li>
                            <li><a href="" >Department of Mathematics</a></li>
                            <li><a href="" >Department of Physics</a></li>
                        </ul>
                        </li>
                       <li><a href="examination.html" target="_blank">EXAMINATION</a></li>
                       <li>
                        <a href="">STUDENT SUPPORT</a>
                        <ul class="dropdown">
                            <li><a href="" >Approval Forms</a></li>
                            <li><a href="" >College Magazine</a></li>
                            <li><a href="" >Clubs & Associations</a></li>
                            <li><a href="" >Cells</a></li>
                            <li><a href="" >Facilities</a></li>
                            <li><a href="" >Grooming Standards</a></li>
                        </ul>
                        </li>
                       <li><a href="library.html" target="_blank">LIBRARY</a></li>
                       <li><a href="admission.html" target="_blank">ADMISSIONS</a></li>
                   </ul>
               </nav>
           </div>
        </header>
        <div class="image-container">
            <img src="background1.jpg" alt="marian">
            <div class="text">
            <h1>Admissions</h1>
            <h4>Home > Contact</h4>
            </div>
        </div>

        <div class="contact-form">
            <form action="" method="post" onsubmit="return validateForm()">
                <h1>Contact Us</h1>
                <input type="text" placeholder="Your Name" name="name" id="name">
                <input type="email" placeholder="Email Address" name="email" id="email">
                <input type="number" placeholder="Mobile number with country code" name="number" id="number" >
                <textarea name="message"  placeholder="Message" name="number" id="message" ></textarea>
                <input type="submit" value="Send Message">
            </form>
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
            <p>Copyright &copy 2024 All Rights Reserved | Marian College Kuttikanam | Privacy Policy | Terms & Conditions</p>
        </div>
        
</body>
</html>