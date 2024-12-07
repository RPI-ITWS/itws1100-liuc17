<?php
include 'includes/conn.php';
include 'includes/header.php';

echo "<div class='flex-container'>";
echo "<h1 class='page-header'>Projects and Labs</h1>";

// Fetch projects ordered by lab_id
$query = "SELECT * FROM myProjects ORDER BY lab_id, id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Initialize variables to group projects
$currentLab = null;

while ($row = mysqli_fetch_assoc($result)) {
    // Check if we are in a new lab group
    if ($currentLab !== $row['lab_id']) {
        if ($currentLab !== null) {
            // Close the previous lab container
            echo "</div>";
        }
        // Start a new lab container
        $currentLab = $row['lab_id'];
        echo "<div class='flex-item'>";
        echo "<div class='project-header'>Lab " . htmlspecialchars($currentLab) . "</div>";
    }

    // Display each project under the current lab
    echo "<div class='project-details'>";
    echo "<a href='" . htmlspecialchars($row['link']) . "' target='_blank'>" . htmlspecialchars($row['title']) . "</a>";
    echo "</div>";
}

// Close the last lab container
if ($currentLab !== null) {
    echo "</div>";
}

echo "</div>";

include 'includes/footer.php';
?>
