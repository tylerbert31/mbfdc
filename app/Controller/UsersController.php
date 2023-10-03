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
		$this->Auth->allow(array('register', 'registered'));
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
	public $components = array('Paginator', 'Session');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {

			$this->User->create();

			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('controller' => 'users', 'action' => 'login'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete($id)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function register()
	{
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

	public function login()
	{
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
}