<?php
include 'db_connection.php';

if (isset($_GET['search'])) {
    $search = strtolower($_GET['search']); // Convert search term to lowercase

    $sql = "SELECT a1 FROM a";
    $result = $conn->query($sql);

    if ($result) {
        $found = false;

        while ($row = $result->fetch_assoc()) {
            $content = strtolower($row['a1']); // Convert content to lowercase

            if (strpos($content, $search) !== false) { // Check for substring match
                echo "Content: " . $row["a1"] . "<br>";
                $found = true;
            }
        }

        if (!$found) {
            echo "No results found";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
