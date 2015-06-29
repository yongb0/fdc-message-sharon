
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
   				$userid_from =  $this->Session->read('usersid');

   				$arrayname[] = array();
   				if (!$this->Session->read("usersid")) {

				$this->redirect(array(
							'controller' => 'main',
							'action' => 'login'
								)
							);
				}
   				
				else
				{
							$arrayMessage[] = array();
						    if ($this->request->is('post')) {
						        // If the form data can be validated and saved...
						        if ($this->Message->save($this->request->data)) {
						            // Set a session flash message and redirect.
						          //  $this->Shttp://message.localhost/messages/send#ession->setFlash('Message Sent');
						        	$s = '';
						             $getuserMessage = $this->Message->find('all', 
							 		 array(
							       'fields' => array('DISTINCT Message.to_id', 'users.name','users.id','users.modified_ip','Message.modified'),
							       'joins' => array(array('table' => 'users',
							                               'alias' => 'users',
							                               'type' => 'INNER',
							                               'conditions' => array('OR' => array('users.id = Message.to_id', 'users.id = Message.from_id'),array('OR' => array('Message.from_id' => $usId, 'Message.to_id' => $usId) ),'users.id !=' =>$usId),
							                               'order' =>array('Message.id DESC')
							                         )),'order' => array('Message.id DESC')
							         )
							  );
						    	  $this->set('messages',$getuserMessage);

						    	  foreach ($getuserMessage as $value) {

						    	  		$message_toId = $value['users']['id'];
						    	  		$mesName = $value['users']['name'];
						    	  		$findWhereId = $this->Message->find('first', array('conditions' => array('from_id' => array($message_toId,$userid_from),'to_id' => array($message_toId,$userid_from)),'order' => 'modified DESC'));
						    	  		foreach ($findWhereId as $key => $valueMessage) {
						    	  			$content = $valueMessage['content'];
						    	  			$modified = $valueMessage['modified'];


						    	  			$s .= $content.'|'.$message_toId.'@';	

						    	  			$arrayname[$message_toId] = '<b>'.$content.'</sb>'.'<br />'.$modified;


						    	  		}
						    	  	//	$s .= '<br />';
						    	  }


						    	  $this->set('contentS',$arrayname);
						    	  	

						      

						        }
						    }
						    else
						    {
						    	$s = '';
						    	  $getuserMessage = $this->Message->find('all', 
							 		 array(
							       'fields' => array('DISTINCT Message.to_id', 'users.name','users.id','users.modified_ip','Message.modified'),
							       'joins' => array(array('table' => 'users',
							                               'alias' => 'users',
							                               'type' => 'INNER',
							                               'conditions' => array('OR' => array('users.id = Message.to_id', 'users.id = Message.from_id'),array('OR' => array('Message.from_id' => $usId, 'Message.to_id' => $usId) ),'users.id !=' =>$usId),
							                               'order' =>array('Message.id DESC')
							                         )),'order' => array('Message.id DESC')
							         )
							  );
						    	  $this->set('messages',$getuserMessage);

						    	  foreach ($getuserMessage as $value) {

						    	  		$message_toId = $value['users']['id'];
						    	  		$mesName = $value['users']['name'];
						    	  		$findWhereId = $this->Message->find('first', array('conditions' => array('from_id' => array($message_toId,$userid_from),'to_id' => array($message_toId,$userid_from)),'order' => 'modified DESC'));
						    	  		foreach ($findWhereId as $key => $valueMessage) {
						    	  			$content = $valueMessage['content'];
						    	  			$modified = $valueMessage['modified'];


						    	  			$s .= $content.'|'.$message_toId.'@';	

						    	  			$arrayname[$message_toId] = '<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"'.$content.'"</sb>'.'<br />'.$modified;


						    	  		}
						    	  	//	$s .= '<br />';
						    	  }


						    	  $this->set('contentS',$arrayname);
						    	  	


						    }
						    $this->set('usid',$usId);
						    $userid_from = $this->Session->read('usersid');
							$this->set('sessname',$this->Message->find('all', 
					 		 array(
					       'fields' => array('users.name','users.id'),
					       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('users.id' => $userid_from)
				                         ))
				         )
				  ));

							$this->set('userList',$this->Message->find('all', 
					 		 array(
					       'fields' => array('DISTINCT users.id','users.name'),
					       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('users.id !=' => $userid_from)
				                         ))
				         )
				  ));

						}
			}


			function getMessage()
			{	
				$userid_from = $this->Session->read('usersid');
				$id = $this->params['pass']; 
				$userid_to = $id[0]; 
				//$this->set('id',$userid);

				if (!$this->Session->read("usersid")) {

				$this->redirect(array(
							'controller' => 'main',
							'action' => 'login'
								)
							);
				}
				else
				{


				$listMessage=$this->Message->find('all', array('conditions' => array('from_id' => array($userid_to,$userid_from),'to_id' => array($userid_to,$userid_from)),'order by' => 'Message.modified'));

				$this->set('messageList',$listMessage);
				$this->set('userid',$userid_from);
				$this->set('userid_to',$userid_to);
			//	$this->set('username', $this->User->findById($id));

				$this->set('sessname',$this->Message->find('all', 
				 		 array(
				       'fields' => array('users.name','users.id'),
				       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('users.id' => $userid_from)
				                         ))
				         )
				  ));

				$this->set('idUser',$userid_to);

				$this->set('username',$this->Message->find('all', 
				 		 array(
				       'fields' => array('users.name','users.id'),
				       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('OR' => array('users.id = Message.to_id', 'users.id = Message.from_id'),'users.id' => $userid_to),
				                               'order' =>array('Message.to_id DESC')
				                         ))
				         )
				  ));



				 $this->paginate = array('conditions' => array('from_id' => array($userid_to,$userid_from),'to_id' => array($userid_to,$userid_from)),
			        'limit' => 3,
			        'order' => array('modified' => 'asc')
			    );
			     
			    // we are using the 'User' model
			    $users = $this->paginate('Message');
			     
			    // pass the value to our view.ctp
				    $this->set('users', $users);

				   } 

			}

			function deleteMessage()
			{
				$userid_from = $this->Session->read('usersid');
				// $id = $this->params['pass']; 
				// $messageIdimp = $id[0];

				// $explodeIds = explode('-', $messageIdimp);
				// $messageId = $explodeIds[1];
				// $to_id = $explodeIds[0];


				$to_id= $_POST['userid'];
				$messageId= $_POST['messageid'];


				$this->Message->deleteAll(array('Message.id' => $messageId));


				echo json_encode('Message Deleted');

				// $this->redirect(array(
				// 			'controller' => 'messages',
				// 			'action' => 'getMessage/'.$to_id
				// 				)
				// 			);

			}
			function deleteConversation()
			{
				$userid_from = $this->Session->read('usersid');
				$id = $this->params['pass']; 
				$other_user = $id[0];


			//	$this->Message->deleteAll(array('Message.id' => $messageId));


				// $conditions = array(
				//     'OR' => array(
				//         'Message.to_id' => $userid_from,
				//         'Message.to_id'=> $other_user
				//     ),'OR' => array(
				//         'Message.from_id' => $userid_from,
				//         'Message.from_id'=> $other_user)
				// );


				$conditions = array(
				    array('Message.to_id' => array($userid_from,$other_user),'Message.from_id' =>array($userid_from,$other_user))
				);


			//	$condition = 

				$this->Message->deleteAll($conditions);

				$this->redirect(array(
							'controller' => 'messages',
							'action' => 'send'
								)
							);


			}

	}