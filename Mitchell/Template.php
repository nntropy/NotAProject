<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
</head>
<body>
<div id="wrapper">
    <div id="banner">
    </div>

    <nav id="navigation">
        <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="restaurant.php">Restaurants</a></li>
            <li><a href="review.php">Review</a></li>
            <li><a href="profile.php">Profile</a></li>
            <!-- Trigger/Open The Modal -->
            <li><button id="cAccount">Create Account</button></li>
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <div class="createAccount">
                    <span class="close">&times;</span>
                    <input type="text" placeholder="Username" id="username">
                    <input type="password" placeholder="password" id="password">
                    <a href="#" class="create">create an account</a>
                    <a href="#" class="forgot">forgot password?</a>
                    <input type="submit" id="login" value="Sign In">
                </div>
            </div>
        </ul>
    </nav>

    <div id="content_area">
        <?php echo $content; ?>
    </div>

    <div id="sidebar">
        <?php echo $sidebar; ?>
    </div>

    <footer>
        <p>All rights reserved</p>
    </footer>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var cAccount = document.getElementById("cAccount");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the submit button
    var submit = document.getElementById('login');

    // When the user clicks the button, open the modal
    cAccount.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When user clicks on submit, creates a query
    submit.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
