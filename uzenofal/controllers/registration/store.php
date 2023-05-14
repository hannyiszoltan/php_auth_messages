<?php
use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];

//form validálás
$errors = [];
if(!Validator::email($email)) {
    $errors['email'] = 'Kérlek valós e-mail címet adj meg!';
}

if(!Validator::string($password, 7,255)) {
    $errors['password'] = 'Kérlek hosszabb jelszót adj meg!';
}
if(!Validator::string($username, 3,255)) {
    $errors['username'] = 'Kérlek hosszabb felhasználónevet adj meg!';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

//van-e ilyan felhaszáló?
$user = $db->query('SELECT email FROM users WHERE email = :email',[
    'email' => $email
])->find();

if ($user) {
    //ha van
    header('Location: /login');
    exit();
} else {
    //ha nincs
    $db->query('INSERT INTO users(email, username, password) VALUES(:email, :username, :password)',[
        'email' => $email,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
    //user id miatt user lekérdezése
    $user = $db->query('SELECT id, email, username FROM users WHERE email = :email',[
        'email' => $email
    ])->find();

    login([
        'username' => $username,
        'email' => $email,
        'id' => $user['id']
    ]);

    header('Location: /messages');
    exit();
}