<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'Az üzenet legalább 1 karakter legyen és nem lehet 1000 karakternél több.';
}
//oldalfrissítés miatt üzenetek lekérése
$messages = $db->query('SELECT * FROM messages INNER JOIN users ON messages.user_id = users.id ORDER BY created_at DESC')->get();

if (! empty($errors)) {
    return view("messages/index.view.php", [
        'heading' => 'Hibás üzenet',
        'messages' => $messages,
        'errors' => $errors
    ]);
}
//üzenet közzététele
$db->query('INSERT INTO messages(body, created_at, user_id) VALUES(:body, :created_at, :user_id)', [
    'body' => $_POST['body'],
    'created_at' => date("Y-m-d H:i:s"),
    'user_id' => $_SESSION['user']['id']
]);

header('Location: /messages');
die();


