<?php 
// Start a session to manage login state
session_start();

// Include database connection and header
include('quiz3/includes/conn.php');
include('quiz3/includes/header.php');

// Check if user is logged in
if (isset($_SESSION['username'])) {
    echo "<div class='welcome-message'>";
    echo "<h3>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h3>";

    // Check if the logged-in user is an admin
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin') {
        echo "<a href='admin.php' class='btn btn-admin'>Admin Panel</a>";
    }

    echo "<a href='logout.php' class='btn btn-logout'>Logout</a>";
    echo "</div>";
} else {
    // Display login form if user is not logged in
    echo "<div class='login-form'>";
    echo "<h3>Login</h3>";
    echo "<form method='POST' action=''>";
    echo "<label for='username'>Username:</label>";
    echo "<input type='text' name='username' id='username' required>";
    echo "<label for='password'>Password:</label>";
    echo "<input type='password' name='password' id='password' required>";
    echo "<button type='submit' name='login'>Login</button>";
    echo "</form>";
    echo "</div>";
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to validate user credentials
    $query = "SELECT * FROM mySiteUsers WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type']; // Store user type (e.g., 'user' or 'admin')

        // Redirect to refresh the page with the welcome message
        header("Location: index.php");
        exit;
    } else {
        echo "<div class='error-message'>Invalid username or password.</div>";
    }
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
include('quiz3/includes/footer.php');
?>
