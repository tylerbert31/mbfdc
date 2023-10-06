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
		$this->loadModel('User');
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
		$user_id = $this->Auth->user('user_id');
		$this->set('user_id', $user_id);

		$messages = $this->Message->find(
			'all',
			array(
				'fields' => array('Message.receiver', 'MAX(Message.timestamp) AS latest_timestamp', 'User.user_id', 'User.lastname', 'User.firstname', 'User.profile_url'),
				'conditions' => array('Message.sender' => $user_id),
				'group' => array('Message.receiver'),
				'joins' => array(
					array(
						'table' => 'users',
						'alias' => 'User',
						'type' => 'LEFT',
						'conditions' => array(
							'User.user_id = Message.receiver'
						)
					)
				)
			)
		);

		$this->set('messages', $messages);
	}

	public function view($id = null)
	{
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}

	public function add()
	{

		// Fetch User ID
		$this->set('user', $this->Auth->user('user_id'));

		if ($this->request->is('post')) {
			$this->Message->create();
			$this->request->data['Message']['sender'] = $this->Auth->user('user_id');
			$this->request->data['Message']['timestamp'] = date('Y-m-d H:i');
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash('The message has been saved.');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The message could not be saved. Please, try again.');
			}
		}
	}
	public function getMessages()
	{
		$messages = $this->Message->find('all');
		$this->set([
			'messages' => $messages,
			'_serialize' => ['messages']
		]);
	}

	public function direct($id = null)
	{
		if (!$this->Message->find('first', array('conditions' => array('Message.receiver' => $id)))) {

			$this->Session->setFlash('User does not exist.');
			return $this->redirect(array('action' => 'index'));
		} else {
			$user_id = $this->Auth->user('user_id');
			$this->set('user_id', $user_id['User']);
			// Fetch User model instance

			$user_profile = $this->User->find(
				'first',
				array(
					'conditions' => array('User.user_id' => $user_id),
					'fields' => array('User.profile_url', 'User.firstname', 'User.user_id')
				)
			);

			$receiver_profile = $this->User->find(
				'first',
				array(
					'conditions' => array('User.user_id' => $id),
					'fields' => array('User.profile_url', 'User.firstname')
				)
			);

			$this->set('user_profile', $user_profile['User']);
			$this->set('receiver_profile', $receiver_profile['User']);

			$messages = $this->Message->find(
				'all',
				array(
					'conditions' => array(
						'AND' => array(
							array(
								'OR' => array(
									array('Message.sender' => $user_id),
									array('Message.receiver' => $user_id)
								)
							),
							array(
								'OR' => array(
									array('Message.sender' => $id),
									array('Message.receiver' => $id)
								)
							)
						)
					),
					'order' => 'Message.timestamp DESC'
				)
			);


			$this->set('messages', $messages);
		}

	}

}