<?php header("Location: login.php?msg=thanks");
exit;
?>
<?php
require "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Make sure POST fields exist
    if (!isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["password"])) {
        die("Form fields missing");
    }

    $username = trim($_POST["username"]);
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($username === "" || $email === "" || $password === "") {
        die("All fields are required.");
    }

    // Hashing password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Prepare query
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("SQL error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed);

    // Execute
    if (mysqli_stmt_execute($stmt)) {
        header("Location: login.php?success=1");
        exit;
    } else {
        die("Registration failed: " . mysqli_error($conn));
    }
}
?>

