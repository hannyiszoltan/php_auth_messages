<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$messages = $db->query('SELECT * FROM messages INNER JOIN users ON messages.user_id = users.id ORDER BY created_at DESC')->get();

view("messages/index.view.php", [
    'heading' => 'Üzenetek',
    'messages' => $messages
]);