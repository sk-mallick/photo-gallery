<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$db = new SQLite3('db.sqlite');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $target = 'upload/' . basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
        $stmt = $db->prepare("INSERT INTO photos (filename, uploaded_at) VALUES (:fname, datetime('now'))");
        $stmt->bindValue(':fname', $target);
        $stmt->execute();
        echo "Uploaded successfully!";
    } else {
        echo "Upload failed!";
    }
}
?>
<h2>Admin Dashboard</h2>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="photo" required>
    <button type="submit">Upload</button>
</form>
<a href="index.php">View Gallery</a> | <a href="logout.php">Logout</a>
