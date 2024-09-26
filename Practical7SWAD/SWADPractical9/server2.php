<?php
$con = mysqli_connect("localhost", "root", "", "ajax_demo");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'display') {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No users found</td></tr>";
        }
    } elseif (isset($_GET['action']) && $_GET['action'] === 'search') {
        $search = $_GET['search'];
        $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>" . $row["name"] . " - " . $row["email"] . "</div>";
            }
        } else {
            echo "No results found";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if (mysqli_query($con, $sql)) {
            echo "User added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}
