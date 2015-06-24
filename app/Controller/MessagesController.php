
<?php

	class MessagesController extends AppController {

		public $components = array('Session');

		public function beforeFilter() {

			$this->Auth->allow();

		}
		public function index()
		{
			if (!$this->Session->read("usersid")) {

				$this->redirect(array(
							'controller' => 'main',
							'action' => 'login'
								)
							);
			} else {
			}
		}

		public function addMessage()
		{
			$hideId = $_POST['hideId'];
			$id = $this->params['pass']; 
			$userid_to = $id[0]; 
			 if ($this->request->is('post')) {
			        // If the form data can be validated and saved...
			        if ($this->Message->save($this->request->data)) {
			      		
			      		$this->redirect(array(
							'controller' => 'messages',
							'action' => 'getMessage/'.$hideId
								)
							);
			      //  	echo "<script>alert('$hideId');</script>";

			        }
			    }
		}

		public function send() {

   				$usId = $this->Session->read('usersid');



   				


			    if ($this->request->is('post')) {
			        // If the form data can be validated and saved...
			        if ($this->Message->save($this->request->data)) {
			            // Set a session flash message and redirect.
			            $this->Session->setFlash('Message Sent');

			            $this->set('messages',$this->Message->find('all', 
				 		 array(
				       'fields' => array('DISTINCT Message.to_id','users.name','users.id','users.modified_ip'),
				       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('users.id = Message.to_id','Message.from_id' => $usId,'Message.to_id !=' => $usId),
				                               'order' =>array('Message.to_id DESC')
				                         ))
				         )
				  ));

			        //    $this->set('')
			       //      $this->redirect(array(
										// 	'controller' => 'main',
										// 	'action' => 'index'
										// ));

			            //return $this->redirect('/recipes');
			        }
			    }
			    else
			    {
			    	  $this->set('messages',$this->Message->find('all', 
				 		 array(
				       'fields' => array('DISTINCT Message.to_id', 'users.name','users.id','users.modified_ip'),
				       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('users.id = Message.to_id','Message.from_id' => $usId,'Message.to_id !=' => $usId),
				                               'order' =>array('Message.to_id DESC')
				                         ))
				         )
				  ));



			    }
			    $this->set('usid',$usId);
			}


			function getMessage()
			{	
				$userid_from = $this->Session->read('usersid');
				$id = $this->params['pass']; 
				$userid_to = $id[0]; 
				//$this->set('id',$userid);


				$listMessage=$this->Message->find('all', array('conditions' => array('from_id' => array($userid_to,$userid_from),'to_id' => array($userid_to,$userid_from)),'order by' => 'Message.modified'));

				$this->set('messageList',$listMessage);
				$this->set('userid',$userid_from);
				$this->set('userid_to',$userid_to);
			//	$this->set('username', $this->User->findById($id));



				$this->set('username',$this->Message->find('all', 
				 		 array(
				       'fields' => array('users.name','users.id'),
				       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('users.id = Message.to_id','users.id' => $userid_to),
				                               'order' =>array('Message.to_id DESC')
				                         ))
				         )
				  ));


			}

			function deleteMessage()
			{
				$userid_from = $this->Session->read('usersid');
				$id = $this->params['pass']; 
				$messageIdimp = $id[0];

				$explodeIds = explode('-', $messageIdimp);
				$messageId = $explodeIds[1];
				$to_id = $explodeIds[0];


				$this->Message->deleteAll(array('Message.id' => $messageId));


				$this->redirect(array(
							'controller' => 'messages',
							'action' => 'getMessage/'.$to_id
								)
							);

			//	$this->set('id',$messageId);

			}
			function deleteConversation()
			{
				$userid_from = $this->Session->read('usersid');
				$id = $this->params['pass']; 
				$other_user = $id[0];


			//	$this->Message->deleteAll(array('Message.id' => $messageId));


				$conditions = array(
				    'OR' => array(
				        'Message.to_id' => $userid_from,
				        'Message.to_id'=> $other_user,
				        'Message.from_id' => $userid_from,
				        'Message.from_id'=> $other_user
				    )
				);

				$this->Message->deleteAll($conditions);

				$this->redirect(array(
							'controller' => 'messages',
							'action' => 'send'
								)
							);


			}

	}