<?php
session_start();
include 'includes/conn.php'; // Adjust the path if necessary

if (isset($_POST['login'])) {
    // Escape input to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to validate user credentials
    $query = "SELECT * FROM mySiteUsers WHERE username = '$userId'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify password (if stored as hashed)
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];

            // Redirect to the index page
            header('Location: index.php');
            exit();
        } else {
            $error = "Invalid User ID or Password!";
        }
    } else {
        $error = "Invalid User ID or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ITWS Fall 2024</title>
    <link rel="stylesheet" href="includes/quiz3.css"> <!-- Adjust path if necessary -->
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">User ID:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="login">Login</button>
        </form>

        <!-- Display error message if login fails -->
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
