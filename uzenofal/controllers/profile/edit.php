<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];
//bejelentkezett user adatainak lekérése a módosításhoz
$user = $db->query('SELECT id, username, email FROM users WHERE id = :id', [
    'id' => $_SESSION['user']['id']
])->findOrFail();

authorize($user['id'] === $currentUserId);

view("profile/edit.view.php", [
    'heading' => 'Profil Szerkesztése',
    'errors' => [],
    'user' => $user
]);