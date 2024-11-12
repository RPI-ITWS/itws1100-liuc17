<?php 
  include('includes/init.inc.php'); // include the DOCTYPE and opening tags
  include('includes/functions.inc.php'); // functions
?>
<title>PHP &amp; MySQL - ITWS</title>   

<?php include('includes/head.inc.php'); ?>

<h1>PHP &amp; MySQL</h1>
      
<?php include('includes/menubody.inc.php'); ?>

<h2>Movies & Actors</h2>
<p>Below is a list of movies and their corresponding actors:</p>

<table>
  <tr>
    <th>Movie Title</th>
    <th>Actor</th>
  </tr>
  <?php
  // Establish database connection
  @$db = new mysqli('localhost', 'root', 'root', 'iitF23');

  if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: ';
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  } else {
    // SQL query to fetch movies and actors
    $query = "SELECT movies.title, actors.first_name, actors.last_name
              FROM movies
              JOIN movie_actor ON movies.movieid = movie_actor.movie_id
              JOIN actors ON movie_actor.actor_id = actors.actorid
              ORDER BY movies.title, actors.last_name";
    $result = $db->query($query);

    // Check for results and display them
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='2'>No movies and actors found.</td></tr>";
    }

    // Free result set and close the database connection
    $result->free();
    $db->close();
  }
  ?>
</table>

<?php include('includes/foot.inc.php'); ?>
