<?php namespace App\Controllers;

use Exception;

use Trial\Routing\Controller;

class Users extends Controller {
	
	public function indexAction ($request, $response) {
		$db = $this->dbFactory;
		$users = $db->query('users')->fetch();
		
		return $this->template->view('users/index', [
			'title' => $this->language->get('users.all'),
			'users' => $users
		]);
	}
	
	public function userAction ($request, $response) {
		$db = $this->dbFactory;
		$user = $db->repository('users')->find($request->get('user'));
		
		if (!$user) {
			throw new Exception(
				sprintf('User by id %s is not exists!', $request->get('user'))
			);
		}
		
		$pages = $db->query('pagesByUser')->fetch($user->id);
		$comments = $db->query('commentTree')->fetch('users', $user->id);
		
		$title = sprintf(
			'%s %s',
			$this->language->get('users.one'),
			$user->username
		);
		
		return $this->template->view('users/user', [
			'title'    => $title,
			'user'     => $user,
			'comments' => $comments,
			'pages'    => $pages
		]);
	}
	
}