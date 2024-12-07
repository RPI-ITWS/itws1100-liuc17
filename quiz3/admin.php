<?php
session_start();
include('includes/conn.php');
include('includes/header.php');

// Check if the user is an admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    echo "<div class='error-message'>Access denied. Admins only.</div>";
    include('includes/footer.php');
    exit;
}
?>

<div class="admin-container">
    <h1>Admin Panel</h1>

    <!-- Manage Labs -->
    <div class="manage-section">
        <h2>Manage Labs</h2>
        <form method="POST" action="">
            <label for="lab_title">New Lab Title:</label>
            <input type="text" name="lab_title" id="lab_title" required>
            <button type="submit" name="add_lab">Add Lab</button>
        </form>

        <h3>Existing Labs</h3>
        <ul>
            <?php
            $labs = mysqli_query($conn, "SELECT * FROM myLabs ORDER BY id");
            while ($lab = mysqli_fetch_assoc($labs)) {
                echo "<li>" . htmlspecialchars($lab['title']) . " 
                      <form method='POST' style='display:inline;'>
                          <input type='hidden' name='lab_id' value='" . $lab['id'] . "'>
                          <button type='submit' name='delete_lab'>Delete</button>
                      </form>
                      </li>";
            }
            ?>
        </ul>
    </div>

    <!-- Manage Projects -->
    <div class="manage-section">
        <h2>Manage Projects</h2>
        <form method="POST" action="">
            <label for="project_title">New Project Title:</label>
            <input type="text" name="project_title" id="project_title" required>
            <label for="project_description">Description:</label>
            <input type="text" name="project_description" id="project_description" required>
            <label for="project_link">Link:</label>
            <input type="text" name="project_link" id="project_link" required>
            <label for="lab_id">Lab ID:</label>
            <input type="number" name="lab_id" id="lab_id" required>
            <button type="submit" name="add_project">Add Project</button>
        </form>

        <h3>Existing Projects</h3>
        <ul>
            <?php
            $projects = mysqli_query($conn, "SELECT * FROM myProjects ORDER BY lab_id, id");
            while ($project = mysqli_fetch_assoc($projects)) {
                echo "<li>" . htmlspecialchars($project['title']) . " (Lab " . $project['lab_id'] . ") 
                      <form method='POST' style='display:inline;'>
                          <input type='hidden' name='project_id' value='" . $project['id'] . "'>
                          <button type='submit' name='delete_project'>Delete</button>
                      </form>
                      </li>";
            }
            ?>
        </ul>
    </div>
</div>

<?php
// Handle form submissions for adding or deleting labs and projects

// Add Lab
if (isset($_POST['add_lab'])) {
    $lab_title = mysqli_real_escape_string($conn, $_POST['lab_title']);
    $query = "INSERT INTO myLabs (title) VALUES ('$lab_title')";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<div class='error-message'>Error adding lab: " . mysqli_error($conn) . "</div>";
    }
}

// Delete Lab
if (isset($_POST['delete_lab'])) {
    $lab_id = intval($_POST['lab_id']);
    $query = "DELETE FROM myLabs WHERE id = $lab_id";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<div class='error-message'>Error deleting lab: " . mysqli_error($conn) . "</div>";
    }
}

// Add Project
if (isset($_POST['add_project'])) {
    $project_title = mysqli_real_escape_string($conn, $_POST['project_title']);
    $project_description = mysqli_real_escape_string($conn, $_POST['project_description']);
    $project_link = mysqli_real_escape_string($conn, $_POST['project_link']);
    $lab_id = intval($_POST['lab_id']);
    $query = "INSERT INTO myProjects (title, description, link, lab_id) 
              VALUES ('$project_title', '$project_description', '$project_link', $lab_id)";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<div class='error-message'>Error adding project: " . mysqli_error($conn) . "</div>";
    }
}

// Delete Project
if (isset($_POST['delete_project'])) {
    $project_id = intval($_POST['project_id']);
    $query = "DELETE FROM myProjects WHERE id = $project_id";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<div class='error-message'>Error deleting project: " . mysqli_error($conn) . "</div>";
    }
}

include('includes/footer.php');
?>
