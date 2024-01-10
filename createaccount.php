<?php session_start() ?>
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
                echo '<a href="./giveaway.php">Pet give away</a>';
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
        <div class="formmessage"> 
            <h1 class="title">Create an Account</h1> 

        <p class="italic">Use this form to create a new account! Be mindful of the requirements for a username and password.</p>
        </div>

        <form method="post">
            <fieldset class="petform">
                <label>Username:</label>
                <input type="text" name="username" required pattern="[a-zA-Z0-9]+">
                <p style="font-size: medium">Note: Username must contain uppercase or lowercase letters and numbers only</p>
                <br>
                <label>Password:</label>
                <input type="password" name="password" required pattern="(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{4,}">
                <p style="font-size: medium">Note: Password must be at least 4 characters and must both contain letters and numbers only</p>
                <br>
                <button type="submit">Create account</button>
            </fieldset>
            
        </form>

        <?php 

        //Check if the user has submitted the form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Get the entered username and password from the form
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            //store all username/password combos in array
            $users = file('users.txt', FILE_IGNORE_NEW_LINES);

            //trim each element in the array to just get the username of each user
            for ($i = 0; $i < count($users); $i++)
                $users[$i] = substr($users[$i], 0, strpos($users[$i], ":"));

            //check if the username already exists
            if (in_array($username, $users)) {
                echo "<script type='text/javascript'>alert('Username already taken. Please choose a different one.');</script>";
            } else {
                //user doesn't exist, so add it to the text file along with the password
                file_put_contents('users.txt', $username . ':' . $password . PHP_EOL, FILE_APPEND);
                echo "<script type='text/javascript'>alert('Account created successfully. You can now login.');</script>";
            }
        }
        ?>
    </div>
    
    <?php include('footer.php'); ?>

    <script src="script.js"></script>
</body>
</html>