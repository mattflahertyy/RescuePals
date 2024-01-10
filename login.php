<?php 
    session_start(); 

    //Check if the user has submitted the form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        //Get the entered username and password from the form
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $_SESSION['username'] = $username;

        if(isset($_SESSION['username'])){
            $_SESSION['$current_user'] = $_SESSION['username'];
        }
        
        //store all username/password combos in array
        $users = file('users.txt', FILE_IGNORE_NEW_LINES);

        $_SESSION['user_count'] = count($users);

        //trim usernames and store in array
        foreach ($users as $user) {
            $current_user = substr($user, 0, strpos($user, ":"));
            $usernames_array[] = $current_user;
        }
        
        //trim passwords and store in array
        foreach ($users as $user) {
            $current_password = substr($user, strpos($user, ":") + 1);
            $passwords_array[] = $current_password;
        }

        //if username is inside the usernames array, get position, then validate password
        if (in_array($username, $usernames_array)) {
            for ($i = 0; $i < count($usernames_array); $i++) {
                if ($usernames_array[$i] == $username)
                    $idx = $i;
            }

            if ($passwords_array[$idx] == $password) {
                header("Location:./giveaway.php");
                echo "<script type='text/javascript'>alert('hi');</script>";
            }
            else
                echo "<script type='text/javascript'>alert('Login failed: Incorrect password. Please try again.');</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('Login failed: Username does not exist. Please try again.');</script>";
        }
    }
?>
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
            <h1 class="title">Login</h1> 

        <p class="italic">After logging in you will have access to the pet giveaway form.</p>
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
                <button type="submit">Login</button>
            </fieldset>
            
        </form>
    </div>
    
    <?php include('footer.php'); ?>

    <script src="script.js"></script>
</body>
</html>