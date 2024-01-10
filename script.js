function disclaimerFunction() {
    alert("This website is committed to keeping its users' information confidential and will not sell or misuse it. The website builder is not responsible for any incorrect information that may be posted by a pet owner or any other user. By using this website, you agree to these terms and conditions.");
}

setInterval(displayDateTime, 1000);


function displayDateTime() {
    const date = new Date();
    const time = new Date();
    document.getElementById("date-time").innerHTML = "Date: " + date.toLocaleDateString() + "  Time: " + time.toLocaleTimeString();
}

function validate_find() {
    if ((!document.getElementById("find-type-dog").checked && !document.getElementById("find-type-cat").checked))
        window.alert("Please choose dog or cat!");
    else if ((!document.getElementById("find-dog-friendly-yes").checked && !document.getElementById("find-dog-friendly-no").checked))
        window.alert("Please specifiy if your pet is dog friendly!");
    else if ((!document.getElementById("find-cat-friendly-yes").checked && !document.getElementById("find-cat-friendly-no").checked))
    window.alert("Please specifiy if your pet is cat friendly!");
    else if ((!document.getElementById("find-child-friendly-yes").checked && !document.getElementById("find-child-friendly-no").checked))
    window.alert("Please specifiy if your pet is child friendly!");

    // if ((!document.getElementById("find-gender-dog").checked && !document.getElementById("find-gender-cat").checked) ||
    // (!document.getElementById("find-dog-friendly").checked && !document.getElementById("find-cat-friendly").checked && 
    // !document.getElementById("find-child-friendly").checked && !document.getElementById("find-none-friendly").checked))
    // {
    //     window.alert("Error: Cannot leave any boxes blank!");
    // }
}

function validate_giveaway() {
    const breed_select = document.getElementById("giveaway-select-breed");
    const age_select = document.getElementById("giveaway-select-age");

    const emailInput = document.getElementById("giveaway-owner-email");
    const email = emailInput.value;
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
    if (!document.getElementById("giveaway-type-dog").checked && !document.getElementById("giveaway-type-cat").checked) 
        window.alert("Error: Select the animal type!");
    else if (breed_select.value == "select")
        window.alert("Error: Please select a breed");
    else if (age_select.value == "select")
        window.alert("Error: Please select an age category");
    else if (!document.getElementById("giveaway-gender-male").checked && !document.getElementById("giveaway-gender-female").checked)
        window.alert("Error: Select the gender!");
    else if (!document.getElementById("giveaway-dog-friendly-yes").checked && !document.getElementById("giveaway-dog-friendly-no").checked)
        window.alert("Error: Please let us know if your pet gets along with other dogs!");
    else if (!document.getElementById("giveaway-cat-friendly-yes").checked && !document.getElementById("giveaway-cat-friendly-no").checked)
        window.alert("Error: Please let us know if your pet gets along with other cats!");
    else if (!document.getElementById("giveaway-child-friendly-yes").checked && !document.getElementById("giveaway-child-friendly-no").checked)
        window.alert("Error: Please let us know if your pet gets along with children!");
    else if (document.getElementById("giveaway-owner-firstname").value == "")
        window.alert("Error: Please enter the owners first name!");
    else if (document.getElementById("giveaway-owner-lastname").value == "")
        window.alert("Error: Please enter the owners last name!");
    else if (!emailRegex.test(email))
        window.alert("Error: Email is not valid");

}

function logout() {
    var confirmed = confirm("Are you sure you want to log out?");
    if (confirmed) {
      alert("Logged out");
      window.location = "logout.php";
    }
}