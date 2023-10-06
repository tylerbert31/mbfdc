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
		$this->Auth->allow(array('getMessages', 'reply'));
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
					'fields' => array('User.profile_url', 'User.firstname', 'User.user_id')
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

		if ($this->request->is('post')) {
			$user_id = $this->Auth->user('user_id');
			$this->request->data['Message']['sender'] = $user_id;
			$this->request->data['Message']['receiver'] = $id;
			$this->request->data['Message']['timestamp'] = date('Y-m-d H:i:s');

			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been sent.'));
				return $this->redirect(['action' => 'direct', $id]);
			} else {
				$this->Session->setFlash(__('The message could not be sent. Please, try again.'));
			}
		}



	}

	public function new()
	{
		$user_id = $this->Auth->user('user_id');
		$users = $this->User->find('all', array('conditions' => array('User.user_id' => $user_id)));
		$this->set('user', $users[0]['User']);


		if ($this->request->is('post')) {
			$this->request->data['Message']['sender'] = $user_id;
			$this->request->data['Message']['timestamp'] = date('Y-m-d H:i:s');

			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Session->setFlash(__('The message has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.'));
			}
		}


	}

	public function reply()
	{
		if ($this->request->is('ajax')) {
			// Set the response type to JSON
			$this->autoRender = false;
			$this->response->type('json');
			$this->request->data['timestamp'] = date('Y-m-d H:i:s');

			// Create a new Message entity and populate it with request data
			$this->Message->create();
			$this->Message->set($this->request->data);

			// Save the entity
			if ($this->Message->save()) {
				// Success response
				echo json_encode(['message' => 'Message saved successfully']);
			} else {
				// Error response
				echo json_encode(['message' => 'Error saving message']);
			}
		}
	}


}