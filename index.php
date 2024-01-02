<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search Box Example</title>
</head>
<body>

<h2>Search Example</h2>

<form method="post" action="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" required>
    <input type="submit" value="Search">
</form>

<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = isset($_POST['search']) ? strtolower($_POST['search']) : '';

    $sql = "SELECT a1 FROM a";
    $result = $conn->query($sql);

    if ($result) {
        $found = false;

        while ($row = $result->fetch_assoc()) {
            $content = strtolower($row['a1']);

            if (strpos($content, $search) !== false) {
                echo $row["a1"] . "<br>"; // Display the matched content without "Content:"
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

<form method="post" action="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" required>
    <input type="submit" value="Search">
</form>

</body>
</html>
