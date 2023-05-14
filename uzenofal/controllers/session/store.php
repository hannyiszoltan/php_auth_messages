<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$password = $_POST['password'];
$username = $_POST['username'];

$errors = [];

if(!Validator::string($password)) {
    $errors['password'] = 'Kérlek érvényes jelszót adj meg!';
}

if(!Validator::string($username)) {
    $errors['username'] = 'Kérlek érvényes felhasználó nevet adj meg!';
}

if (! empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->query('SELECT * FROM users WHERE username = :username', [
    'username' => $username
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {

        login([
            'username' => $username,
            'email' => $user['email'],
            'id' => $user['id']
        ]);

        header('Location: /messages');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'Nincs a megadott adatokhoz megfelelő profil.'
    ]
]);


