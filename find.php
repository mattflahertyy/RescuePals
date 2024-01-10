<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Rescue Pals</title>
<meta charset="utf-8">

<link rel="stylesheet" href="style.css">
<link rel="icon" href="images/logo2.png">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<script src="script.js"></script>
    

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
        <div class="petform">
            <h1>Pets will be displayed here:</h1>
            
            <?php
                $pets = array(
                    array("name" => "Kiko", "type" => "Dog", "breed" => "Golden Retriever", "age" => "Less than 1", "gender" => "Male", "dog_friendly" => "Yes", "cat_friendly" => "Yes", "child_friendly" => "Yes", "owner" => "Matt Flaherty", "email" => "mattandkiko@gmail.com" , "image" => "images/kiko.jpg"),
                    array("name" => "Demarcus", "type" => "Cat", "breed" => "Ragdoll Cat", "age" => "10-15", "gender" => "Male", "dog_friendly" => "No", "cat_friendly" => "No", "child_friendly" => "No", "owner" => "Henry Ruggs", "email" => "ruggs11@topgolf.com" , "image" => "images/demarcus.jpg"),
                    array("name" => "Thor", "type" => "Dog", "breed" => "Chihuahua", "age" => "10-15", "gender" => "Male", "dog_friendly" => "No", "cat_friendly" => "Yes", "child_friendly" => "Yes", "owner" => "Sirena Stath", "email" => "sirenaandthor@gmail.com" , "image" => "images/thor.jpg"),
                    array("name" => "Ferg", "type" => "Cat", "breed" => "Persian Cat", "age" => "7-10", "gender" => "Female", "dog_friendly" => "No", "cat_friendly" => "No", "child_friendly" => "Yes", "owner" => "Aaron Hernandez", "email" => "killa_aaron@gmail.com" , "image" => "images/ferg.jpg"),
                    array("name" => "Kirby", "type" => "Dog", "breed" => "Australian Shepherd", "age" => "Less than 1", "gender" => "Male", "dog_friendly" => "Yes", "cat_friendly" => "Yes", "child_friendly" => "Yes", "owner" => "Steve Irwin", "email" => "stevegone@gmail.com" , "image" => "images/kirby.jpg"),
                    array("name" => "Quandra", "type" => "Cat", "breed" => "Scottish Fold Cat", "age" => "1-3", "gender" => "Female", "dog_friendly" => "Yes", "cat_friendly" => "Yes", "child_friendly" => "Yes", "owner" => "Jamal Blue", "email" => "jamal_blue@gmail.com" , "image" => "images/quandra.jpg"),
                );

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['type']) && isset($_POST['dogfriendly']) && isset($_POST['catfriendly']) && isset($_POST['childfriendly'])) {
                        $type = $_POST['type'];
                        $breed = $_POST['breed'];
                        $age = $_POST['age'];
                        $gender = $_POST['gender'];
                        $dog_friendly = $_POST['dogfriendly'];
                        $cat_friendly = $_POST['catfriendly'];
                        $child_friendly = $_POST['childfriendly'];
    
    
                        //Filter the pets based on the form data
                        $matches = [];
                        $matches = array_filter($pets, function($pet) use ($type, $breed, $age, $gender, $dog_friendly, $cat_friendly, $child_friendly) {
                        return ($pet['type'] == $type || $type == "Doesn't matter") &&
                        ($pet['breed'] == $breed || $breed == "Doesn't matter") &&
                        ($pet['age'] == $age || $age == "Doesn't matter") &&
                        ($pet['gender'] == $gender || $gender == "Doesn't matter") &&
                        ($pet['dog_friendly'] == $dog_friendly || $dog_friendly == "Doesn't matter") &&
                        ($pet['cat_friendly'] == $cat_friendly || $cat_friendly == "Doesn't matter") &&
                        ($pet['child_friendly'] == $child_friendly || $child_friendly == "Doesn't matter");
                        });
    
    
                        // Display the matching pets
                        if (!is_null($matches) && count($matches) > 0) {
                            echo "<h2>Matching pets:</h2>";
    
                            foreach ($matches as $match) {
                                echo "<img src='" . $match['image'] . "' width='425' height='375'" . "' alt='Pet image'>";
                                echo "<p> Name: " . $match['name'] . 
                                "<br>Type: " . $match['type'] . 
                                "<br> Breed: " . $match['breed'] . 
                                "<br> Age: " . $match['age'] . 
                                "<br> Gender: " . $match['gender'] . 
                                "<br> Dog-friendly: " . $match['dog_friendly'] . 
                                "<br> Cat-friendly: " . $match['cat_friendly'] . 
                                "<br> Child-friendly: " . $match['child_friendly'] .  
                                "<br>Owner: " . $match['owner'] . 
                                "<br>Owner email: ". $match['email'] . "</p>";
                            }
                        } else {
                            echo "<p>No matching pets found.</p>";
                        }
                    }
                }
            ?>
        </div>
        

        <div class="formmessage">
            <h1 class="title">Form to find a certain dog/cat</h1>

            <p class="italic"><em>
                By filling out this form, you can provide important details about the pet you are looking for, 
                such as breed, age, gender, and any distinctive physical or behavioral characteristics. 
                The information you provide will help pet organizations, shelters, and rescue groups in your area 
                to better understand your needs and match you with the pet that is the best fit for you and your family.
            </em></p>
        </div>
        

        <form method="post">
            <fieldset class="petform">

                <label class="question">Type of animal:</label>
                <label>
                    <input type="radio" name="type" id="find-type-dog" value="Dog">
                    Dog
                </label>
                <label>
                    <input type="radio" name="type" id="find-type-cat" value="Cat">
                    Cat
                </label>

                <br>
                <br>

                <label>Breed: </label>
                <select name="breed">
                    <option value="Doesn't matter">Doesn't matter</option>
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
        
                <label>Age category: </label>
                <select name="age">
                    <option value="Doesn't matter">Doesn't matter</option>
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
                <select name="gender">
                    <option value="Doesn't matter">Doesn't matter</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <br>
                <br>

                <label>Gets along with other dogs?</label>
                <label>
                    <input type="radio" name="dogfriendly" id="find-dog-friendly-yes" value="Yes">
                    Yes
                </label>
                <label>
                    <input type="radio" name="dogfriendly" id="find-dog-friendly-no" value="No">
                    No
                </label>

                <br>
                <br>

                <label>Gets along with other cats?</label>
                <label>
                    <input type="radio" name="catfriendly" id="find-cat-friendly-yes" value="Yes">
                    Yes
                </label>
                <label>
                    <input type="radio" name="catfriendly" id="find-cat-friendly-no" value="No">
                    No
                </label>

                <br>
                <br>

                <label>Suitable for a family with small children?</label>
                <label>
                    <input type="radio" name="childfriendly" id="find-child-friendly-yes" value="Yes">
                    Yes
                </label>
                <label>
                    <input type="radio" name="childfriendly" id="find-child-friendly-no" value="No">
                    No
                </label>

                <br>
                <br>

                <button onclick=validate_find()>Submit</button>
                <button>Reset</button>
            </fieldset>  
        </form> 
            
    </div>
    
    <?php include('footer.php'); ?>
</body>
</html>