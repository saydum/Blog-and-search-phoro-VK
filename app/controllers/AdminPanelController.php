<?php

namespace App\controllers;

use PDO;
use League;
use \Delight\Auth;
use App\models\UploadImage;
use App\models\QueryBuilder;



class AdminPanelController
{
	private $templates;
	private $auth;
	private $query;

	public function	__construct(QueryBuilder $query){
		$this->templates = new League\Plates\Engine('../app/views/admin');
		$this->query = $query;
		$db = $query->queryPdo();
		$this->auth = new \Delight\Auth\Auth($db);
	}

	public function index(){
		if ($this->auth->isLoggedIn()) {
			echo $this->templates->render('indexAdminPanel');
		}
		else {
			echo 'Доступ запрешен ! ';

			echo 'Ваш ip ' . $_SERVER['SERVER_ADDR'];


		}

	}

	public function getAll(){

		if ($this->auth->isLoggedIn()) {
			$posts = $this->query->getAll('posts');
			echo $this->templates->render('getAllPost', ['posts' => $posts]);
		}
	}

	public function getOne($id){

		if ($this->auth->isLoggedIn()) {
			$post = $this->query->getOne($id,'posts');

			echo $this->templates->render('getOne', ['post' => $post]);
		}
	}


	public function addPostPage(){
		if ($this->auth->isLoggedIn()) {
			$category = include '../config/category.php';

			echo $this->templates->render('addPost',[
				'name' => 'Добавить посты',
				'category' => $category
			]);
		}

	}

	public function addPost(){
		if ($this->auth->isLoggedIn()) {
			$data = [
				'title' => $_POST['title'],
				'date' => $_POST['date'],
				'about' => $_POST['about'],
				'description' => $_POST['description'],
				'text' => $_POST['text'],
				'category' => $_POST['category'],
				'img' => 'uploads/'.$_FILES['img']['name']

			];

				dd($data);die;

			if (isset($_POST['btn'])) {
				$img = UploadImage::make($_FILES['img']);
				$this->query->insert('posts', $data);
				header("Location: /admin/posts");
			}
		}


	}

	public function updatePost($id){
		if ($this->auth->isLoggedIn()) {

			$category = include '../config/category.php';
			$post = $this->query->getOne($id,'posts');

			echo $this->templates->render('updatePost', [
				'post' => $post,
				'category' => $category
			]);
		}
	}

	public function update($id){
		if ($this->auth->isLoggedIn()) {
			$data = [
				'title' => $_POST['title'],
				'date' => $_POST['date'],
				'about' => $_POST['about'],
				'description' => $_POST['description'],
				'text' => $_POST['text'],
				'category' => $_POST['category'],
				'img' => 'uploads/'.$_FILES['img']['name']

			];

			$this->query->update($id,'posts', $data);
			$img = UploadImage::make($_FILES['img']);
			if (isset($_POST['btn'])) {
				header("Location: /admin/posts");
			}
		}
	}

	public function deletePost($id){
		if ($this->auth->isLoggedIn()) {
			$this->query->delete($id, 'posts');
			header("Location: /admin/posts");
		}
	}

	public function login(){

		echo $this->templates->render('login');

	}

	public function registration(){

		echo $this->templates->render('registration');

		// $this->auth->registration($_POST);
	}

	public function save(){
		if ($this->auth->isLoggedIn()) {
			$this->auth->registration($_POST);
		}
	}

	public function loginIn(){
		try {
			$this->auth->login($_POST['email'], $_POST['password']);

			header("Location: /admin");
		}
		catch (\Delight\Auth\InvalidEmailException $e) {
			die('Wrong email address');
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
			die('Wrong password');
		}
		catch (\Delight\Auth\EmailNotVerifiedException $e) {
			die('Email not verified');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
			die('Too many requests');
		}
		return $this;
		header("Location: /admin");
	}

	public function logout(){
		if ($this->auth->isLoggedIn()) {
			$this->auth->logOut();
			header("Location: /login");
			return $this;
		}
	}



}