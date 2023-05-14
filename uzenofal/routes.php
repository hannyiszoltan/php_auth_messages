<?php
//rest route-ok
$router->get('/','session/create.php')->only('guest');

$router->get('/messages','messages/index.php')->only('auth');
$router->post('/messages','messages/store.php')->only('auth');

$router->get('/profile', 'profile/edit.php')->only('auth');
$router->patch('/profile', 'profile/store.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
