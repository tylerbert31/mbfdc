<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController
{

	public function beforeFilter()
	{
		// parent::beforeFilter();
		$this->Auth->allow(array('getMessages'));
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
		$this->Message->recursive = 0;
		$this->set('messages', $this->Paginator->paginate());
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
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{

		// Fetch User ID
		$this->set('user', $this->Auth->user('user_id'));

		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash('The message has been saved.');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The message could not be saved. Please, try again.');
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
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash('The message has been saved.');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The message could not be saved. Please, try again.');
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
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
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Message->delete($id)) {
			$this->Session->setFlash('The message has been deleted.');
		} else {
			$this->Session->setFlash('The message could not be deleted. Please, try again.');
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function getMessages()
	{
		$messages = $this->Message->find('all');
		$this->set([
			'messages' => $messages,
			'_serialize' => ['messages']
		]);
	}

}