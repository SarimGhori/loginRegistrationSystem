<?php
if (isset($_GET["msg"]) && $_GET["msg"] === "thanks") {
    $success = "Thanks! Your account has been created successfully.";
}
?>

<?php
require "db.php";
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user["username"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid login details.";
    }
}
?>
