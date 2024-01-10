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
            <h1>Dog Care Instructions</h1>
            <h3>Credit of the instructions goes to this website: <a href="https://www.aspca.org/pet-care/dog-care/general-dog-care"> click here</a></h3>
        </div>
        

        
        <div class="petcare">
            <!--https://www.aspca.org/pet-care/dog-care/general-dog-care -->


            <table class="caretables">
                <tr>
                    <td class="petcaredescription">
                        <h3>Feeding</h3>
                        <ul>
                            <li>Puppies eight to 12 weeks old need four meals a day.</li>
                            <li>Feed puppies three to six months old three meals a day.</li>
                            <li>Feed puppies six months to one year two meals a day.</li>
                            <li>When your dog reaches his first birthday, one meal a day is usually enough.</li>
                            <li>For some dogs, including larger canines or those prone to bloat, it's better to feed two smaller meals.</li>
                        </ul>
                    </td>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.amazon.ca%2FTaglory-Stainless-Steel-Non-Slip-Rubber%2Fdp%2FB08QV5CLKG&psig=AOvVaw2yJlGyQyxzU8QMubHk3g38&ust=1676076522429000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCPjH8N_dif0CFQAAAAAdAAAAABAF -->
                        <img class="dogfood" src="images/dogfood.jpg" alt="Picture of dog food" height="190" width="250">
                    </td>
                </tr>
            </table>
        

            <table class="caretables">
                <tr>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Ftuckerpups.com%2Four-services%2Fdog-training%2Fintro-to-dog-frisbee-training-class.php&psig=AOvVaw0Cg1yH73ksJGypqqHuOKFB&ust=1676076457786000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCMjc-MDdif0CFQAAAAAdAAAAABAa -->
                        <img src="images/frisbee.jpg" alt="Picture of frisbee" height="260" width="430">
                    </td>
                    <td class="petcaredescription">
                        <h3>Exercise</h3>
                            <p>
                                Dogs need exercise to burn calories, stimulate their minds, and stay healthy. 
                                Individual exercise needs vary based on breed or breed mix, sex, age and level of health. 
                                Exercise also tends to help dogs avoid boredom, which can lead to destructive behaviors. 
                                Supervised fun and games will satisfy many of your pet's instinctual urges to dig, herd, chew, retrieve and chase.
                            </p>
                    </td>
                </tr>
            </table>


            <table class="caretables">
                <tr>
                    <td class="petcaredescription">
                        <h3>Grooming</h3>
                            <p>
                                Help keep your dog clean and reduce shedding with frequent brushing. 
                                Check for fleas and ticks daily during warm weather. 
                                Most dogs don't need to be bathed more than a few times a year. 
                                Before bathing, comb or cut out all mats from the coat. 
                                Carefully rinse all soap out of the coat, or the dirt will stick to soap residue.
                            </p>
                    </td>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Funsplash.com%2Fs%2Fphotos%2Fdog-bath&psig=AOvVaw3N0lhPt5YeGQvNYSrNMFXg&ust=1676076351516000&source=images&cd=vfe&ved=0CBAQjhxqFwoTCJia3I3dif0CFQAAAAAdAAAAABAE  -->
                        <img src="images/dogbath.jpg" alt="Picture of dog in towel" height="260" width="400">
                    </td>
                </tr>
            </table>



            <table class="caretables">
                <tr>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.etsy.com%2Fca%2Flisting%2F471543991%2Fmodern-dog-house-mid-century-ranch&psig=AOvVaw2affaWbQTPnomYzNRAZjDT&ust=1676076669159000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCMCC1KXeif0CFQAAAAAdAAAAABAF -->
                        <img src="images/doghouse.webp" alt="Picture of dog house" height="260" width="420">
                    </td>
                    <td class="petcaredescription">
                        <h3>Housing</h3>
                        <p>
                            Your pet needs a warm, quiet place to rest, away from all drafts and off the floor. 
                            A training crate or dog bed is ideal, with a clean blanket or pillow placed inside. 
                            Wash the dog's bedding often. If your dog will be spending a lot of time outdoors, 
                            be sure she has access to shade and plenty of cool water in hot weather, and a warm, dry, covered shelter when it's cold.
                        </p>
                    </td>
                </tr>
            </table>

            <table class="caretables">
                <tr>
                    <td class="petcaredescription">
                        <h3>Medicines and Poisons</h3>
                        <p>
                            Never give your dog medication that has not been prescribed by a veterinarian. 
                            If you suspect that your animal has ingested a poisonous substance, 
                            call your veterinarian or the ASPCA Animal Poison Control Center for 24-hour animal poison information at (888) 426- 4435.
                        </p>
                    </td>
                    <td class="image">
                        <!-- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.thesprucepets.com%2Fanti-convulsant-medications-3384864&psig=AOvVaw2yl1ag2NCfTsmifbgaIV0z&ust=1676076874844000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCKCs44ffif0CFQAAAAAdAAAAABAJ -->
                        <img src="images/dogmedicine.jpg" alt="Picture of dog with medicine" height="260" width="400">
                    </td>
                </tr>
            </table>  
            
            <table class="caretables">
                <tr>
                    <td class="image">
                        <!--- https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.thesprucepets.com%2Fdog-toy-styles-1118611&psig=AOvVaw1PORk-BKpYDbvIn59C5La1&ust=1676077121391000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCKCNr_3fif0CFQAAAAAdAAAAABAE -->            
                        <img src="images/dogtoys.jpg" alt="Picture of dog with toys" height="260" width="400">
                    </td>
                    <td class="petcaredescription">
                        <h3>Dog Supply Checklist</h3>
                        <ul>
                            <li>Premium-quality dog food and treats</li>
                            <li>Food dish</li>
                            <li>Water bowl</li>
                            <li>Toys, toys and more toys, including safe chew toys</li>
                            <li>Brush & comb for grooming, including flea comb</li>
                            <li>Collar with license and ID tag</li>
                            <li>Leash</li>
                            <li>Carrier (for smaller dogs)</li>
                            <li>Training crate</li>
                            <li>Dog bed or box with warm blanket or towel</li>
                            <li>Dog toothbrush</li>
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