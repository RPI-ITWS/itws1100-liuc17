<?php
// Start session to manage login state
session_start();

// Include database connection, header, and footer
include 'quiz3/includes/conn.php';
include 'quiz3/includes/header.php';

// Check if user is logged in
if (isset($_SESSION['user_name'])) {
    echo "<div class='welcome-message'>";
    echo "<h3>Welcome, " . htmlspecialchars($_SESSION['user_name']) . "!</h3>";
    
    // Display admin-specific options if user is an admin
    if ($_SESSION['user_type'] === 'admin') {
        echo "<p>You have admin privileges.</p>";
        echo "<a href='quiz3/admin.php' class='btn btn-admin'>Manage Labs/Projects</a>";
    }

    echo "<a href='quiz3/logout.php' class='btn btn-logout'>Logout</a>";
    echo "</div>";
} else {
    // If not logged in, show the login form
    echo "<div class='login-form'>";
    echo "<h3>Login</h3>";
    echo "<form action='quiz3/login.php' method='post'>";
    echo "<label for='username'>Username:</label>";
    echo "<input type='text' name='username' id='username' required>";
    echo "<label for='password'>Password:</label>";
    echo "<input type='password' name='password' id='password' required>";
    echo "<button type='submit' name='login'>Login</button>";
    echo "</form>";
    echo "</div>";
}
?>

<div class="row">
    <div class="picture-layout">
        <img id="circle-img" src="../lab03/profile img.jpg" alt="Profile Photo">
    </div>

    <div class="main">
        <h2>About Me</h2>
        <p>
            Hi! My name is Carina Liu, and I'm a second-year student at Rensselaer Polytechnic Institute. 
            I'm majoring in Information Technology & Web Science, with a concentration in Machine Learning.
        </p>
        <h2>Contact Information</h2>
        <p><b>Email:</b> liuc17@rpi.edu</p>
        <p><b>GitHub:</b> carinaal</p>
        <p><b>Discord:</b> rinn3686</p>
    </div>
</div>

<?php
// Include footer
include 'quiz3/includes/footer.php';
?>
