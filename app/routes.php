 <?php

$router->get('', 'MainController@index');

$router->get('logout', 'AuthController@logout');
$router->get('login', 'AuthController@login');
 $router->get('login/restore', 'AuthController@restoreLogin');

$router->get('register', 'AuthController@register');

$router->get('personalArea', 'AccountController@personalArea');

$router->get('register/verification', 'AuthController@verification');

$router->get('personalArea/edit', 'AuthController@editAccaunt');
$router->get('personalArea/edit/email', 'AuthController@editEmail');
$router->get('personalArea/delete', 'UserController@deleteAccaunt');
$router->get('personalArea/delimg', 'AccountController@dellUserImage');
$router->get('personalArea/notifications', 'AccountController@notifications');
$router->get('datingUser', 'DatingController@dating');

$router->get('profile', 'UserController@userProfile');
$router->get('searchUser', 'DatingController@searchUser');
$router->get('accauntUser', 'AccountController@userAccaunt');
 $router->get('acauntLike/add', 'AccountController@acauntLikeAdd');
 $router->get('acauntLike/del', 'AccountController@acauntLikeDel');
 $router->get('likedUser', 'UserController@likedUser');

$router->post('login', 'AuthController@login');
$router->post('login/restore', 'AuthController@restoreLogin');

$router->post('register', 'AuthController@register');

$router->post('personalArea', 'AccountController@personalArea');
$router->post('personalArea/edit', 'AuthController@editAccaunt');
$router->post('personalArea/edit/email', 'AuthController@editEmail');
$router->post('personalArea/delimg', 'AccountController@dellUserImage');
$router->post('personalArea/notifications', 'AccountController@notifications');

$router->post('profile', 'UserController@userProfile');
$router->post('geolocation', 'UserController@usergeolocation');
$router->post('searchUser', 'DatingController@searchUser');
$router->post('accauntUser', 'AccountController@userAccaunt');
$router->post('acauntLike/add', 'AccountController@acauntLikeAdd');
 $router->post('acauntLike/del', 'AccountController@acauntLikeDel');
 $router->get('likedUser', 'UserController@likedUser');


$router->get('page-not-found', 'MainController@page404');

