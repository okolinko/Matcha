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
 $router->get('sendMassage', 'MassegeController@sendMassage');

 $router->get('reloadMassage', 'MassegeController@reloadMassage');

 $router->get('checkNewMassege', 'MassegeController@checkNewMassege');
 $router->get('iliked', 'UserController@iliked');
 $router->get('trackvisits', 'DatingController@trackvisits');
 $router->get('visitors', 'UserController@visitors');
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
 $router->post('sendMassage', 'MassegeController@sendMassage');
 $router->post('reloadMassage', 'MassegeController@reloadMassage');
 $router->post('statusMassage', 'MassegeController@statusMassage');
 $router->post('checkNewMassege', 'MassegeController@checkNewMassege');
 $router->post('iliked', 'UserController@iliked');
 $router->post('trackvisits', 'DatingController@trackvisits');
 $router->post('newMassegeChat', 'MassegeController@newMassegeChat');

$router->get('page-not-found', 'MainController@page404');

