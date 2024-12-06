<?php
// Include the header and database connection
include 'includes/header.php';
include 'includes/conn.php';
?>

<div class="container">
    <h1>Projects</h1>

    <?php
    // Query the database to retrieve projects
    $sql = "SELECT * FROM myProjects";
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo "<ul>";
        // Loop through and display each record
        while ($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<a href='{$row['link']}' target='_blank'>{$row['title']}</a> - {$row['description']}";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        // Display a message if no data is found
        echo "<p>No projects found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<?php
// Include the footer
include 'includes/footer.php';
?>
