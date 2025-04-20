<?php
$db = new SQLite3('db.sqlite');
$results = $db->query("SELECT * FROM photos ORDER BY uploaded_at DESC");
?>
<h2>Photo Gallery</h2>
<div style="display:flex; flex-wrap:wrap; gap:10px;">
<?php while ($row = $results->fetchArray()): ?>
    <img src="<?= $row['filename'] ?>" width="200" style="border:1px solid #ccc;">
<?php endwhile; ?>
</div>
