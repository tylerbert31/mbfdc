<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController
{

	public function beforeFilter()
	{
		// parent::beforeFilter();
		$this->Auth->allow(array('register', 'registered', 'getUsers', 'getProfile'));
		$this->Auth->authenticate = array(
			'Form' => array(
				'fields' => array('username' => 'email')
			)
		);
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'home');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
	}

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session', 'RequestHandler');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		return $this->redirect(array('action' => 'home'));
	}

	// Page Controllers
	public function register()
	{
		ini_set('date.timezone', 'Asia/Manila');
		//post request
		if ($this->request->is('post')) {
			//create user
			$this->User->create();
			//save user
			$this->request->data['User']['joined'] = date('Y-m-d H:i:s');
			$this->request->data['User']['age'] = 18;

			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			$this->request->data['User']['confirm_password'] = AuthComponent::password($this->request->data['User']['confirm_password']);
			if ($this->User->save($this->request->data)) {

				//redirect to index
				return $this->redirect(array('action' => 'registered'));
			}
		}
	}

	public function registered()
	{

	}

	public function home()
	{

		$user_id = $this->Auth->user('user_id');
		$users = $this->User->find('all', array('conditions' => array('User.user_id' => $user_id)));
		$this->set('user', $users[0]['User']);

	}

	public function update()
	{

		// Load the user's current data for pre-filling the form
		$user_id = $this->Auth->user('user_id');
		$user = $this->User->find('first', array('conditions' => array('user_id' => $user_id)));
		if (!empty($user)) {
			$this->set('user', $user['User']);
		} else {
			$this->set('user', null);
		}

		// If the form was submitted
		if ($this->request->is('post')) {
			//Fetch Data from FORM
			$updateData = array(
				'lastname' => "'" . $this->request->data['User']['lastname'] . "'",
				'firstname' => "'" . $this->request->data['User']['firstname'] . "'",
				'age' => $this->request->data['User']['age'],
				'birthday' => "'" . $this->request->data['User']['birthday'] . "'",
				'gender' => "'" . $this->request->data['User']['gender'] . "'",
				'bio' => "'" . $this->request->data['User']['bio'] . "'"
			);
			//CONDITION - WHERE user_id = $user_id
			$conditions = array('user_id' => $user_id);

			// PERFORM UPDATE
			$this->User->updateAll($updateData, $conditions);

			//Navigate to Home on Success
			$this->Session->setFlash('Profile details updated successfully');
			$this->redirect(array('action' => 'home'));
		}


	}

	public function login()
	{
		ini_set('date.timezone', 'Asia/Manila');
		if ($this->request->is('post')) {

			if ($this->Auth->login()) {
				// Update "last_login" field to current date and time
				$this->User->id = $this->Auth->user('user_id');
				$this->User->saveField('last_login', date('Y-m-d H:i:s'));
				return $this->redirect(array('action' => 'home'));
			} else {
				$this->Session->setFlash("Invalid Email or Password");
			}
		}
	}

	public function logout()
	{
		$this->Auth->logout();
		$this->redirect(array('action' => 'login'));
	}

	public function profile_pic()
	{
		$user_id = $this->Auth->user('user_id');
		$user = $this->User->find('first', array('conditions' => array('user_id' => $user_id)));
		if (!empty($user)) {
			$this->set('user', $user['User']);
		} else {
			$this->set('user', null);
		}

		if ($this->request->is('post')) {
			$file = $this->request->data['User']['photograph'];
			$file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
			$file_new_name = $user_id . '.' . $file_ext;
			$file_destination = WWW_ROOT . 'img' . DS . 'profile_pics' . DS . $file_new_name;

			if (move_uploaded_file($file['tmp_name'], $file_destination)) {
				$this->User->id = $user_id;
				$this->User->saveField('profile_url', 'img/profile_pics/' . $file_new_name);
				$this->Session->setFlash(__('Profile picture uploaded successfully.'));
				$this->redirect(array('action' => 'home'));
			} else {
				$this->Session->setFlash(__('There was an error uploading your profile picture. Please try again.'));
			}
		}
	}

	public function email()
	{
		//fetch email using user id from auth
		$user_id = $this->Auth->user('user_id');
		$user_email = $this->User->find('first', array('conditions' => array('user_id' => $user_id), 'fields' => array('email')));
		$this->set('user_email', $user_email['User']['email']);

		if ($this->request->is('post')) {
			$current_email = $this->request->data['User']['current_email'];
			if ($current_email == $user_email['User']['email']) {
				$new_email = $this->request->data['User']['new_email'];
				$this->User->id = $user_id;
				$this->User->saveField('email', $new_email);
				$this->Session->setFlash(__('Email updated successfully.'));
				$this->redirect(array('action' => 'home'));
			} else {
				$this->Session->setFlash(__('Current email does not match.'));
			}
		}
	}

	public function password()
	{
		//fetch email using user id from auth
		$user_id = $this->Auth->user('user_id');

		if ($this->request->is('post')) {
			$current_password = $this->request->data['User']['current_pass'];
			$new_password = $this->request->data['User']['new_pass'];
			$confirm_password = $this->request->data['User']['confirm_pass'];

			if ($new_password == $confirm_password) {
				$user = $this->User->find('first', array('conditions' => array('user_id' => $user_id), 'fields' => array('password')));
				if ($user['User']['password'] == AuthComponent::password($current_password)) {
					$this->User->id = $user_id;
					$this->User->saveField('password', AuthComponent::password($new_password));
					$this->Session->setFlash(__('Password updated successfully.'));
					$this->redirect(array('action' => 'home'));
				} else {
					$this->Session->setFlash(__('Current password does not match.'));
				}
			} else {
				$this->Session->setFlash(__('New password and confirm password do not match.'));
			}
		}
	}


	// REST API CONTROLLERS
	public function getUsers()
	{
		$users = $this->User->find(
			'all',
			array(
				'fields' => array('User.user_id', 'User.lastname', 'User.firstname', 'User.profile_url')
			)
		);
		$this->set(
			array(
				'users' => $users,
				'_serialize' => 'users'
			)
		);
	}

	public function getProfile($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$profile_url = $this->User->find(
			'first',
			array(
				'conditions' => array('user_id' => $id),
				'fields' => array('profile_url')
			)
		);
		$this->set(
			array(
				'profile_url' => $profile_url['User']['profile_url'],
				'_serialize' => array('profile_url')
			)
		);

	}
}