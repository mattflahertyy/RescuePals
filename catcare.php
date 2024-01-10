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
    
        <div class="title">
            <h1>Cat Care Instructions</h1>
            <h3>Credit of the instructions goes to this website: <a href="https://www.aspca.org/pet-care/cat-care/general-cat-care"> click here</a></h3>
        </div>
        
        <div class="petcare">
            <table class="caretables">
                <tr>
                    <td class="petcaredescription">
                        <h3>Feeding</h3>
                        <ul>
                            <li>Cats require taurine, an essential amino acid, for heart and eye health. The food you choose should be balanced for the life stage of your cat or kitten. Properly balanced foods will contain taurine.</li>
                            <li>You will need to provide fresh, clean water at all times, and wash and refill your cat's water bowls daily.                        </li>
                            <li>Treats should be no more than 5-10% of the diet.</li>
                            <li>Many people feed baby food to a cat or kitten who is refusing food or not feeling well  Please read labels carefully: If the baby food contains onion or garlic powder, your pet could be poisoned.</li>
                            <li>Take your pet to your veterinarian if signs of anorexia, diarrhea, vomiting or lethargy continue for more than two days.
                            </li>
                        </ul>
                    </td>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.carecredit.com%2Fwell-u%2Fpet-care%2Fcanned-vs-dry-cat-food%2F&psig=AOvVaw3-d5OC0wgvTg11RSFAdbfD&ust=1676080846678000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCNCk0e3tif0CFQAAAAAdAAAAABAJ -->
                        <img class="catfood" src="images/catfood.avif" alt="Picture of cat food" height="200" width="350">
                    </td>
                </tr>
            </table>
        

            <table class="caretables">
                <tr>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.millenniumcityvethospital.com%2Fcat-bath-time-survival-guide%2F&psig=AOvVaw0aKWe9qWUFfdI_JWjlPh5P&ust=1676081045412000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCMCIx8zuif0CFQAAAAAdAAAAABAE -->
                        <img src="images/catbath.jpg" alt="Picture of cat getting a bath" height="260" width="430">
                    </td>
                    <td class="petcaredescription">
                        <h3>Grooming</h3>
                            <p>
                                Most cats stay relatively clean and rarely need a bath, but you should brush or comb your cat regularly. 
                                Frequent brushing helps keep your cat's coat clean, reduces the amount of shedding and cuts down on the incidence of hairballs.
                            </p>
                    </td>
                </tr>
            </table>

            <table class="caretables">
                <tr>
                    <td class="petcaredescription">
                        <h3>Housing</h3>
                        <p>
                            Your pet should have her own clean, dry place in your home to sleep and rest. Line your cat's bed with a soft, 
                            warm blanket or towel. Be sure to wash the bedding often. Please keep your cat indoors. 
                            Outdoor cats do not live as long as indoor cats. Outdoor cats are at risk of trauma from cars, 
                            or from fights with other cats, raccoons and free-roaming dogs. Coyotes are known to eat cats. 
                            Outdoor cats are more likely to become infested with fleas or ticks, as well as contract infectious diseases.
                        </p>
                    </td>
                    <td  class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Fthesnazzypetco.com%2Fen-ca%2Fproducts%2Fnatural-wooden-climbing-cat-tree-real-wood-cat-tower-modern-climbing-cat-tower-scratch-play-cat-tree-play-hammock-cat-bed-the-snazzy-pet&psig=AOvVaw0ReHiP5JWeEAjLSV7Yokxz&ust=1676081353927000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCKDBu9_vif0CFQAAAAAdAAAAABAQ -->
                        <img src="images/cathouse.webp" alt="Picture of cat house" height="260" width="300">
                    </td>
                </tr>
            </table>

            <table class="caretables">
                <tr>
                    <td class="image">
                        <!--- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.bobvila.com%2Farticles%2Fwhere-to-put-litter-box%2F&psig=AOvVaw0KrWLQz1x9sZzWpQdlmRdJ&ust=1676081726394000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCODwnpHxif0CFQAAAAAdAAAAABAE -->            
                        <img src="images/catlitter.jpg" alt="Picture of cat with litter" height="260" width="400">
                    </td>
                    <td class="petcaredescription">
                        <h3>Litter Box</h3>
                        <p>
                            All indoor cats need a litter box, which should be placed in a quiet, accessible location. 
                            In a multi-level home, one box per floor is recommended. Avoid moving the box unless absolutely necessary, 
                            but if you must do so, move the box just a few inches per day. Keep in mind that cats won't use a messy, 
                            smelly litter box, so scoop solid wastes out of the box at least once a day. Dump everything, wash with a mild 
                            detergent and refill at least once a week; you can do this less frequently if using clumping litter. 
                            Don't use ammonia, deodorants or scents, especially lemon, when cleaning the litter box. If your cat will not use a litterbox, 
                            please consult with your veterinarian. Sometimes refusal to use a litter box is based on a medical condition that required treatment.
                        </p>
                    </td>
                </tr>
            </table>

            <table class="caretables">
                <tr>
                    <td class="petcaredescription">
                        <h3>Medicines and Poisons</h3>
                        <p>
                            Never give your cat medication that has not been prescribed by a veterinarian. 
                            If you suspect that your animal has ingested a poisonous substance, call your 
                            veterinarian or the ASPCA Animal Poison Control Center for 24-hour animal poison 
                            information at (888) 426- 4435.
                        </p>
                    </td>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.adamspetcare.com%2Fexpert-care-tips%2Fnew-pet-owners%2Fhow-to-give-a-difficult-cat-liquid-medicine&psig=AOvVaw3RPPdKVq5R330D98FgLKIt&ust=1676081554044000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCNiFh7_wif0CFQAAAAAdAAAAABAT -->
                        <img src="images/catmedicine.jpg" alt="Picture of cat with medicine" height="260" width="400">
                    </td>
                </tr>
            </table>  
            
            <table class="caretables">
                <tr>
                    
                    <td class="image">
                        <!--- https://www.google.com/url?sa=i&url=https%3A%2F%2Fmymodernmet.com%2Fbest-cat-toys%2F&psig=AOvVaw38C69KMU8IsK4ui7AEEvJ2&ust=1676232165433000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCMCCksihjv0CFQAAAAAdAAAAABAE -->            
                        <img src="images/cattoys.jpg" alt="Picture of cat with toys" height="260" width="400">
                    </td>
                    <td class="petcaredescription">
                        <h3>Cat Supply Checklist</h3>
                        <ul>
                            <li>Premium-brand cat food</li>
                            <li>Food dish</li>
                            <li>Water bowl</li>
                            <li>Interactive toys</li>
                            <li>Brush & Comb</li>
                            <li>Safety cat collar with ID tag</li>
                            <li>Scratching post or scratching pad</li>
                            <li>Litter box and litter</li>
                            <li>Cat carrier</li>
                            <li>Cat bed or box with warm blanket or towel</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>  
    
    <?php include('footer.php'); ?>

    <script src="script.js"></script>
</body>
</html>