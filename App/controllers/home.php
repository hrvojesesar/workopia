<?php

use Framework\Database;

$config = require basePath("config/db.php");
$db = new Database($config);

$listings = $db->query("SELECT * FROM listings LIMIT 6")->fetchAll(PDO::FETCH_OBJ);

loadView('home', ['listings' => $listings]);
