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
