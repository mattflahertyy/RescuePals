<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Rescue Pals</title>
<meta charset="utf-8">

<link rel="stylesheet" href="style.css">
<link rel="icon" href="images/logo2.png">

</head>
<body>
    <?php include('header.php'); ?>
    
    <div class="sidebar">         
        <?php
            if(isset($_SESSION['username'])){
                $current_user = $_SESSION['username'];
            }
        
            

            //if a user is logged in, display log out in sidebar
            if (!isset($current_user)) {
                echo '<h2>Menu</h2>';
                echo '<a href="./index.php">Home Page</a>';
                echo '<a href="./find.php">Find a dog/cat</a>';
                echo '<a href="./dogcare.php">Dog Care</a>';
                echo '<a href="./catcare.php">Cat Care</a>';
                echo '<a href="./login.php">Pet give away</a>';
                echo '<a href="./createaccount.php">Create Account</a>';
                echo '<a href="./contact.php">Contact Us</a>';
            }
            else {
                echo '<h2>Menu</h2>';
                echo '<a href="./index.php">Home Page</a>';
                echo '<a href="./find.php">Find a dog/cat</a>';
                echo '<a href="./dogcare.php">Dog Care</a>';
                echo '<a href="./catcare.php">Cat Care</a>';
                echo '<a href="./giveaway.php">Pet give away</a>';
                echo '<a href="./createaccount.php">Create Account</a>';
                echo '<a href="./contact.php">Contact Us</a>';

                echo '<a href="#" onclick="logout();return false;">Log Out</a>';
            }
        ?> 
    </div>
    
    <div class="main">
        <table>     
            <tr>
                <td class="welcomemessage">
                    <p> Adopt, don't shop: Give a forever home to a furry friend.</p>
                </td>
                <td>
                    <!---Reference https://unsplash.com/photos/ISg37AI2A-s-->
                    <img src="images/homepicdog.jpg" alt="Picture of puppy and kitten" height="300" width="450">
                </td>
            </tr> 
            <tr>
                <td class="companyinfo">
                    <p >
                        Welcome to our non-profit animal rescue website! Founded in 2023, we are dedicated to providing a safe haven for abandoned and rescued dogs and cats. 
                        Our mission is to give every animal a second chance at happiness and love.</p>
                    <p>
                        Through our website, you can not only find your new furry companion, 
                        but you can also give away your pet to a loving home. Our team is passionate about finding the right match for each animal, 
                        ensuring they receive the best care and attention possible. With a wide variety of breeds, sizes, and personalities to choose from, you're sure to find your perfect pet. 
                        Join us in our mission to make a difference in the lives of animals in need.
                    </p>
                </td>
                <td>
                    <!---Reference https://pixabay.com/images/id-5074732/-->
                    <img src="images/homepiccat.jpg" alt="Picture of puppy and kitten" height="300" width="450">
                </td>
            </tr>
            <tr>
                <td class="companyinfo">
                    <p >
                        We allow the following features: Browse for cats/dogs, find a specific pet, tips on dog and cat care, and a pet give away form. 
                        We also provide a contact page to reach out to us for any inquiries.
                    </p>
    
                </td>
                <td>
                    <!---Reference https://pixabay.com/images/id-1785760/-->
                    <img src="images/homepicpuppies.jpg" alt="Picture of puppy and kitten" height="300" width="450">
                </td>
            </tr>
        </table>   
    </div>
    
    <?php include('footer.php'); ?>

    <script src="script.js"></script>
</body>
</html>