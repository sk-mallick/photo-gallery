<?php
$db = new SQLite3('db.sqlite');
$db->exec("CREATE TABLE IF NOT EXISTS photos (
    id INTEGER PRIMARY KEY,
    filename TEXT,
    uploaded_at TEXT
)");

$db->exec("CREATE TABLE IF NOT EXISTS admin (
    username TEXT,
    password TEXT
)");

$db->exec("INSERT INTO admin (username, password) VALUES ('admin', '1234')");
echo "Database initialized!";
?>
