<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new SQLite3('db.sqlite');
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM admin WHERE username = :user AND password = :pass");
    $stmt->bindValue(':user', $user);
    $stmt->bindValue(':pass', $pass);
    $result = $stmt->execute();

    if ($result->fetchArray()) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
    } else {
        $error = "Invalid login!";
    }
}
?>
<form method="post">
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <input name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>
