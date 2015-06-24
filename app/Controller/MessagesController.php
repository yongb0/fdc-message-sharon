
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

		public function send() {

   				$usId = $this->Session->read('usersid');


   			//	$this->set('clients', $this->Client->find('all'));

   				


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
				                               'conditions' => array('users.id = Message.to_id','Message.from_id' => $usId),
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
				                               'conditions' => array('users.id = Message.to_id','Message.from_id' => $usId),
				                               'order' =>array('Message.to_id DESC')
				                         ))
				         )
				  ));
			    }

			    // If no form data, find the recipe to be edited
			    // and hand it to the view.
			    //$this->set('recipe', $this->Recipe->findById($id));
			}

	}