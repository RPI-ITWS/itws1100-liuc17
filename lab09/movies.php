<?php
include('includes/init.inc.php'); // include the DOCTYPE and opening tags
include('includes/functions.inc.php'); // functions
?>
<title>PHP & MySQL - ITWS</title>

<?php include('includes/head.inc.php'); ?>

<h1>PHP & MySQL</h1>

<?php include('includes/menubody.inc.php'); ?>

<h2>Movies & Actors</h2>
<p>Below is a list of movies and their corresponding actors:</p>
<table>
    <tr><th>Movie Title</th><th>Actor</th></tr>
    <?php
    $dbOk = true;
    @$db = new mysqli('localhost', 'root', 'root', 'iitF23');
    if ($db->connect_error) {
        echo '<div class="messages">Could not connect to the database. Error: ' . $db->connect_errno . ' - ' . $db->connect_error . '</div>';
        $dbOk = false;
    }
    
    if ($dbOk) {
        // SQL query to join movies, actors, and movie_actor tables
        $query = 'SELECT movies.title, actors.first_name, actors.last_name 
                  FROM movies
                  JOIN movie_actor ON movies.movieid = movie_actor.movie_id
                  JOIN actors ON actors.actorid = movie_actor.actor_id
                  ORDER BY movies.title';

        $result = $db->query($query);
        
        if ($result) {
            // Loop through each result and output it in a table row
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                echo '<td>' . htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) . '</td>';
                echo '</tr>';
            }
            $result->free();
        } else {
            echo '<tr><td colspan="2">No records found or query failed.</td></tr>';
        }
    }

    // Close the database connection
    $db->close();
    ?>
</table>

<?php include('includes/foot.inc.php'); ?>
