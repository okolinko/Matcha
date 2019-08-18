<?php

namespace App\Controllers;

use App\Models\Auth;
use App\Models\User;


class AuthController {

	public $errors;

	public function __construct()
	{
		$this->errors = [];
	}

	public function register()
	{

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];

			if (!$this->userInputValidate($email, $password)) {

				return view('register', ['errors' => $this->errors]);
			}

			if (!$this->userComparePassword($password, $password2)) {

				return view('register', ['errors' => $this->errors]);
			}

			if (!Auth::checkName($name)) {
				$this->errors[] = 'Неправильное длина или формат имени';

				return view('register', ['errors' => $this->errors]);

			}

			if (!Auth::checkEmail($email)) {
				$this->errors[] = 'Неправильный формат email';

				return view('register', ['errors' => $this->errors]);
			}

			if ($user = User::getUserByEmail($email)) {
				$this->errors[] = 'Такой email уже используется';
				return view('register', ['errors' => $this->errors]);
			}
			if ($user = User::userNameExists($name)) {
				$this->errors[] = 'Такое имя уже используется';

				return view('register', ['errors' => $this->errors]);
			}


			User::register($name, $email, $password);
			echo "<div style=\"background-color: indigo; text-align:center; color: white\"> Аккаунт зарегистрирован. Код активации отправлен на почту $email</div>";


		}
		return view('register');


	}

	public function signupSocailNetwork(){

        $client_id = '624678039195-hli1h1c4bu2kgfoktu8qq6s1oo2da4i7.apps.googleusercontent.com'; // Client ID
        $client_secret = 'pekbuetluogaQocBbqNibVOX'; // Client secret
        $redirect_uri = 'https://lite.camagru.website/signupSocialNetwork'; // Redirect URI


        if (isset($_GET['code'])) {

            $result = false;
            $params = array(
                'client_id'     => $client_id,
                'client_secret' => $client_secret,
                'redirect_uri'  => $redirect_uri,
                'grant_type'    => 'authorization_code',
                'code'          => $_GET['code']
            );
            $url = 'https://accounts.google.com/o/oauth2/token';

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($curl);
            curl_close($curl);

            $tokenInfo = json_decode($result, true);

            if (isset($tokenInfo['access_token'])) {
                $params['access_token'] = $tokenInfo['access_token'];

                $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
                if (isset($userInfo['id'])) {
                    $userInfo = $userInfo;
                    $result = true;
                }
            }

            $email              = $userInfo['email'];
            $user_pic           = $userInfo['picture'];
            $user_first_name    = $userInfo['given_name'];
            $user_last_name     = $userInfo['family_name'];
            $network_id         = $userInfo['id'];


            $sn = Auth::getSocialNetwork("sn_network_id", $network_id);


            if (!empty($sn))
            {
                $userId = $sn->sn_user_id;

                $user = User::getUserById($userId);

                Auth::login($user);
                redirect('personalArea');
                exit(0);
//                print "<pre>";
//                print_r($sn);
//                exit(0);
            }

//            exit(0);
            if (!empty($email))
            {
                $user = User::getUserByEmail($email);

                if (!empty($user)) {

                    $createSocial = [
                        "sn_network_id" => $network_id,
                        "sn_network"    => 1,
                        "sn_user_id"    => $user->id
                    ];

                    Auth::createSocialNetwork($createSocial);
                    
                    Auth::login($user);
                    redirect('personalArea');
                    exit(0);
                }
            }

            $hash_email = User::registerSocialNetwork($user_first_name." ".$user_last_name, $email, hash("sha256",uniqid()));

            $user = User::getUserByHashEmail($hash_email);

            $createSocial = [
                "sn_network_id" => $network_id,
                "sn_network"    => 1,
                "sn_user_id"    => $user->id
            ];

            Auth::createSocialNetwork($createSocial);

            Auth::login($user);
            redirect('personalArea');
            exit(0);
            
//            if ($result)
//                redirect('lite.camagru.website/login');
            print "<pre>";
            print_r($userId);

    }





	    exit(0);
    }

	public function login()
	{
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			if (!$this->userInputValidate($email, $password)) {
				return view('login', ['errors' => $this->errors]);
			}

			$user = User::getUserByEmail($email);

			if (!$user) {
				$this->errors[] = 'Неправильные данные для входа на сайт';

				return view('login', ['errors' => $this->errors]);
			}

			if (!Auth::checkPassword($user, $password)) {
				$this->errors[] = 'Неправильно введен пароль';

				return view('login', ['errors' => $this->errors]);
			}

//		  Подтверждение регистрации по почте

			if (!Auth::isEmailConfirm($user)) {
				$this->errors[] = 'Для входа необходимо подтвердить email. Необходимо перейти по ссылке, которую вы получили на Ваш электронный ящик';

				return view('login', ['errors' => $this->errors]);
			}


			Auth::login($user);
			redirect('personalArea');

		}

		return view('login');
	}

	public function restoreLogin() {
		if ($_SESSION['userId'])
		{
			return redirect('personalArea');
		}
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];

			if (!$this->userValidate($email, $name)) {

				return view('userEdit', ['errors' => $this->errors]);
			}
			if (!$this->userComparePassword($password, $password2)) {

				return view('userEdit', ['errors' => $this->errors]);
			}
			$user = User::getUserByEmail($email);
			$userId = $user->id;
			User::editPassword($userId, $email, $password);

			return redirect('login');
		}

		return view('restoreAccaunt');
	}


	public function editAccaunt() {

		if (!$_SESSION['userId'])
		{
			return redirect('personalArea');
		}
		$userId = User::checkLogged();
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];

			if (!$this->userInputValidate($email, $password)) {

				return view('userEdit', ['errors' => $this->errors]);
			}
			if (!$this->userCompare($password, $password2)) {

				return view('userEdit', ['errors' => $this->errors]);
			}

			User::editPassword($userId, $email, $password);

			return redirect('personalArea');
		}
		return view('userEdit');
	}

	/*
	 * Доделать изменение Email
	 */


	public function editEmail() {

		if (!$_SESSION['userId'])
		{
			return redirect('personalArea');
		}
		$userId = User::checkLogged();

		if (isset($_POST['submit'])) {

			$password = $_POST['password'];
			$email = $_POST['email'];
			$email1 = $_POST['email1'];
			$email2 = $_POST['email2'];

			if (!$this->userInputValidate($email1, $password)) {

				return view('EmailEdit', ['errors' => $this->errors]);
			}
			if (!$this->userCheckEmail($email, $password)) {

				return view('EmailEdit', ['errors' => $this->errors]);
			}
			if (!$this->userCompare($email1, $email2)) {

				return view('EmailEdit', ['errors' => $this->errors]);
			}

			User::editEmail($userId, $email1);

			return redirect('personalArea');
		}
		return view('EmailEdit');
	}




	/*
	 * Validate user login form fields
	 * @param string $email
	 * @param string $password
	 * @return bool
	 */
	private function userInputValidate(string $email, string $password) : bool
	{
		if (!Auth::checkEmail($email)) {
			$this->errors[] = 'Неправильный email';

			return false;
		}

		if (!Auth::validatePassword($password)) {
			$this->errors[] = 'Пароль не должен быть короче 6-ти символов';

			return false;
		}

		return true;
	}

	private function userCompare(string $password, string $password2) : bool
	{
		if ($password !== $password2) {
			$this->errors[] = 'Данные для изменения не совпадают';
			return false;
		}

		return true;
	}


	private function userValidate(string $email, string $name) : bool
	{
		if (!Auth::restoreEmail($email)) {
			$this->errors[] = 'Данный email не зарегистрирован';

			return false;
		}

		if (!Auth::restoreName($name)) {
			$this->errors[] = 'Пользователь с данным именем не зарегистрирован';

			return false;
		}

		return true;
	}

	private function userCheckEmail(string $email, string $password) : bool
	{
		if (!Auth::restoreEmail($email)) {
			$this->errors[] = 'Данный email не зарегистрирован';

			return false;
		}

		if (!Auth::restorePassword($password)) {
			$this->errors[] = 'Данный пароль не подходит к этому аккаунту';

			return false;
		}

		return true;
	}

	private function userComparePassword(string $password, string $password2) : bool
	{
		if ($password !== $password2) {
			$this->errors[] = 'Пароли не совпадают';
			return false;
		}

		return true;
	}


	/*
	 * Logout user from app
	 * @return redirect index
	 */
	public function logout()
	{
		Auth::logout();

		return redirect('');
	}

	/*
	 * Активация аккаунта по почте
	 * @return redirect login
	 */
	public function verification(){

		$id = $_GET['hash'];
		Auth::activRegistration($id);

		return redirect('login');
}

}
