<?php 
    session_start();

    if (!isset($_SESSION['$current_user'])) {
        header("Location:./login.php");
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

    <?php
        if(isset($_SESSION['username'])){
            $current_user = $_SESSION['username'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //retrieve form data and store in variables
            $type = $_POST['type'];
            $breed = $_POST['breed'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $dog_friendly = $_POST['dogfriendly'];
            $cat_friendly = $_POST['catfriendly'];
            $child_friendly = $_POST['childfriendly'];
            $comment = $_POST['comment-area'];
            $owner_first_name = $_POST['ownerfname'];
            $owner_last_name = $_POST['ownerlname'];
            $owner_email = $_POST['owneremail'];

            $emailRegex = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
            if (empty($type))
                echo "<script type='text/javascript'>alert('Please select a type.');</script>";
            else if ($breed == "select")
                echo "<script type='text/javascript'>alert('Please select a breed.');</script>";
            else if ($age == "select")
                echo "<script type='text/javascript'>alert('Please select an age.');</script>";
            else if (empty($gender))
                echo "<script type='text/javascript'>alert('Please select a gender.');</script>";
            else if (empty($dog_friendly))
                echo "<script type='text/javascript'>alert('Please let us know if your pet is dog friendly.');</script>";
            else if (empty($cat_friendly))
                echo "<script type='text/javascript'>alert('Please let us know if your pet is cat friendly.');</script>";
            else if (empty($child_friendly))
                echo "<script type='text/javascript'>alert('Please let us know if your pet is child friendly.');</script>";
            else if (empty($owner_first_name))
                echo "<script type='text/javascript'>alert('Please enter the owners first name.');</script>";
            else if (empty($owner_last_name))
                echo "<script type='text/javascript'>alert('Please enter the owners last name.');</script>";
            else if (!filter_var($owner_email, FILTER_VALIDATE_EMAIL))
                echo "<script type='text/javascript'>alert('Please enter a valid email address.');</script>";
            else {
                $file_contents = file('petinfo.txt');
                //counting the number of elements in the array
                $count = 0;
                foreach ($file_contents as $fc) {
                    if(trim($fc) != '') { // check if line is not blank
                      $count++; // increment counter
                    }
                }
                $id = $count + 1;

                $record = "{$id}:{$current_user}:{$type}:{$breed}:{$age}:{$gender}:{$dog_friendly}:{$cat_friendly}:{$child_friendly}:{$comment}:{$owner_first_name}:{$owner_last_name}:{$owner_email}\n";

                file_put_contents('petinfo.txt', $record, FILE_APPEND);

                echo "<script type='text/javascript'>alert('Pet record added successfully!');</script>";
            }
        }
    ?>

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
            <h1 class="title">Form to give away a dog/cat</h1> 

        <p class="italic"><em>
            By filling out this form, you agree to give away your pet to the new owner and release all rights and responsibilities associated with pet ownership. 
            This form also provides a way for you to share important information about your pet's history, personality, and any special needs to the new owner, 
            to ensure a smooth transition and a happy life for your furry friend.
        </em></p>
        </div>

        <form method="POST">
            <fieldset class="petform">
                <label>Type of animal:</label>
                <label>
                    <input type="radio" name="type" id="giveaway-type-dog" value="Dog">
                    Dog
                </label>
                <label>
                    <input type="radio" name="type" id="giveaway-type-cat" value="Cat">
                    Cat
                </label>

                <br>
                <br>
                <label>Breed</label>
                <select id="giveaway-select-breed" name="breed">
                    <option value="select">Select...</option>
                    <option value="Golden Retreiver">Golden Retriever</option>
                    <option value="Australian Shepherd">Australian Shepherd</option>
                    <option value="Rotweiler">Rottweiler</option>
                    <option value="Chihuaha">Chihuahua</option>
                    <option value="Black Labrador">Black Labrador</option>
                    <option value="Poodle">Poodle</option>
                    <option value="Greyhound">Greyhound</option>
                    <option value="Weiner Dog">Weiner Dog</option>
                    <option value="Border Collie">Border Collie</option>
                    <option value="Pitbull">Pitbull</option>
                    <option value="Ragdoll Cat">Ragdoll Cat</option>
                    <option value="Persian Cat">Persian Cat</option>
                    <option value="Sphynx Cat">Sphynx Cat</option>
                    <option value="American Shorthair Cat">American Shorthair Cat</option>
                    <option value="Scottish Fold Cat">Scottish Fold Cat</option>
                </select>

                <br>
                <br>

                <label>Age category</label>
                <select id="giveaway-select-age" name="age">
                    <option value="select">Select...</option>
                    <option value="Less than 1">Less than 1</option>
                    <option value="1-3">1-3</option>
                    <option value="3-7">3-7</option>
                    <option value="7-10">7-10</option>
                    <option value="10-15">10-15</option>
                    <option value="15+">15+</option>
                </select>
                <br>
                <br>

                <label>Gender:</label>
                <label>
                    <input type="radio" name="gender" id="giveaway-gender-male" value="Male">
                    Male
                </label>
                <label>
                    <input type="radio" name="gender" id="giveaway-gender-female" value="Female">
                    Female
                </label>

                <br>
                <br>

                <label>Gets along with other dogs?</label>
                <label>
                    <input type="radio" name="dogfriendly" id="giveaway-dog-friendly-yes" value="Yes">
                    Yes
                </label>
                <label>
                    <input type="radio" name="dogfriendly" id="giveaway-dog-friendly-no" value="No">
                    No
                </label>

                <br>
                <br>

                <label>Gets along with other cats?</label>
                <label>
                    <input type="radio" name="catfriendly" id="giveaway-cat-friendly-yes" value="Yes">
                    Yes
                </label>
                <label>
                    <input type="radio" name="catfriendly" id="giveaway-cat-friendly-no" value="No">
                    No
                </label>

                <br>
                <br>

                <label>Suitable for a family with small children?</label>
                <label>
                    <input type="radio" name="childfriendly" id="giveaway-child-friendly-yes" value="Yes">
                    Yes
                </label>
                <label>
                    <input type="radio" name="childfriendly" id="giveaway-child-friendly-no" value="No">
                    No
                </label>

                <br>
                <br>
        
                <label>Comment area (optional)</label>
                <br>
                <textarea class="commentarea" name="comment-area"></textarea>

                <br>
                <br>

                <label>Owner First Name:</label>
                <input type="text" id="giveaway-owner-firstname" name="ownerfname">
                <label>Owner Last Name:</label>
                <input type="text" id="giveaway-owner-lastname" name="ownerlname">
                
                <br>
                <br>

                <label>Current owners email:</label>
                <input type="text" id="giveaway-owner-email" name="owneremail">

                <br>
                <button type="submit">Submit</button>
            </fieldset>
        </form>
    </div>

    
    
    <?php include('footer.php'); ?>

    <script src="script.js"></script>
</body>
</html>