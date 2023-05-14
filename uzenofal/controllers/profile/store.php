<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$email = $_POST['email'];
//validálás
$errors = [];
if(!Validator::email($email)) {
    $errors['email'] = 'Kérlek valós e-mail címet adj meg!';
}

if (! empty($errors)) {
    return view('profile/edit.view.php', [
        'errors' => $errors,
        'heading' => 'Profil Szerkesztése'
    ]);
}
//email módosítás
$db->query('UPDATE users SET email = :email WHERE id = :id', [
    'email' => $email,
    'id' => $_POST['id']
]);
//e-mail módosítás miatt a session-ben is frissítem az adatokat
$user = $db->query('SELECT id, email, username FROM users WHERE id = :id', [
    'id' => $_SESSION['user']['id']
])->findOrFail();

login([
    'username' => $user['username'],
    'email' => $user['email'],
    'id' => $user['id']
]);
//visszajelzés
view('profile/edit.view.php',[
    'user' => $user,
    'heading' => 'Profil Szerkesztése',
    'success' => 'Sikeres módosítás.'
]);
