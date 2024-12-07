<div class="footer">
            <h3>Carina Liu - ITWS1100</h3>
            <?php
            include('conn.php');
            $sql = "SELECT content FROM myFooter";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . $row['content'] . "</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
