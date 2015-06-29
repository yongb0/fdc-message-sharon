
<?php

	class MainController extends AppController {

		public $components = array('Session','RequestHandler');
		public function beforeFilter() {

		    $this->Auth->allow();

		}

		public function checkField() {

			$this->autoRender = false;
			if ($this->request->is('ajax')) {
				$data = array(
							$this->request->data['field'] => $this->request->data['value']
						);
				if ($this->request->data['field'] === 'password') {
					$data = array(
							'password' => $this->request->data['value'],
							'cpassword' => $this->request->data['cpassword']
						);
				} else if ($this->request->data['field'] === 'cpassword') {
					$data = array(
							'cpassword' => $this->request->data['value'],
							'password' => $this->request->data['cpassword']
						);
				}
				$this->loadModel('User');
				$this->User->set($data);
			 	$valid = $this->User->validates();
			 	$json = array(
			 				'valid' => $valid,
			 				'errors' => $this->User->validationErrors
			 			);
			 	echo json_encode($json);
			}

		}

		public function index() {


			 $this->loadModel('User');

			if (!$this->Session->read("usersid")) {

				$this->redirect(array(
							'controller' => 'main',
							'action' => 'login'
								)
							);
			} else {


				$this->redirect(array(
							'controller' => 'messages',
							'action' => 'send'
								)
							);



   				}


			//     if ($this->request->is('post')) {
			        
			//     }
			//     else
			//     {
			//     	  $this->set('messages',$this->User->find('all', 
			// 	 		 array(
			// 	       'fields' => array('DISTINCT messages.to_id', 'users.name','users.id','users.modified_ip'),
			// 	       'joins' => array(array('table' => 'users',
			// 	                               'alias' => 'userst',
			// 	                               'type' => 'INNER',
			// 	                               'conditions' => array('users.id = messages.to_id','messages.from_id' => $usId,'messages.to_id !=' => $usId),
			// 	                               'order' =>array('messages.to_id DESC')
			// 	                         ))
			// 	         )
			// 	  ));
			//     }




			// }

		}


		public function registration() {


			$errors = "";
			if (!$this->Session->read('usersid')) {
				$this->set('login',0);
				if ($this->request->is('post')) {
					$errors = '';
					$data = array(
								'name' => $this->request->data['name'],
								'email' => $this->request->data['email'],
								'password' => $this->request->data['password'],
								'cpassword' => $this->request->data['cpassword']
							);
					$this->loadModel('User');
					$this->User->set($data);
					if ($this->User->validates()) {
						$saveData = array(
									'name' => $this->request->data['name'],
									'email' => $this->request->data['email'],
									'password' => Security::hash($this->request->data['password']),
									'cpassword' => Security::hash($this->request->data['cpassword']),
									'created' => date('Y-m-d h:i:s'),
									'modified' => date('Y-m-d h:i:s'),
									'created_ip' => $this->request->clientIp(),
									'modified_ip' => $this->request->clientIp(),
									'last_login_time' => date('Y-m-d h:i:s')
								);

								function isJapanese($lang) {
							          return preg_match('/[\x{4E00}-\x{9FBF}\x{3040}-\x{309F}\x{30A0}-\x{30FF}]/u', $lang);
							      }
							      $ifJapanese = isJapanese($this->request->data['password']);
							      $ifJapaneseEmail = isJapanese($this->request->data['email']);


							      if($ifJapanese == 1 || $ifJapaneseEmail == 1)
							      {
							      	$ifJapanese = " password field has illegal characters";
							      }
							      else
							      	{

							      		$success = $this->User->save($saveData);
										if ($success) {
											$user = $this->User->findByEmail($this->request->data['email']);
											$id = $user['User']['id'];
											$this->Session->write('usersid',$id);
											echo "<script>alert('Successfully registered new user account');</script>";
											echo "<script>location.href = 'completed'; </script>";
										}
							      	}

						
					} else {
						$errors = "";
							   // $word = "激安価格お買い得タイヨー脱腸帯·片側用 fm 腰回り";
							     // $word2 = "This is the english language";

							      function isJapanese($lang) {
							          return preg_match('/[\x{4E00}-\x{9FBF}\x{3040}-\x{309F}\x{30A0}-\x{30FF}]/u', $lang);
							      }
							      $ifJapanese = isJapanese($this->request->data['password']);
							      $ifJapaneseEmail = isJapanese($this->request->data['email']);

							      if($ifJapanese == 1 || $ifJapaneseEmail == 1)
							      {
							      	$ifJapanese = "password field has illegal characters";
							      }
							      else
							      	$ifJapanese = "";
							  


						foreach($this->User->validationErrors as $error) {
							$errors .= $error[0] . ",<br>";
						}
					}
					$this->set('data',$this->request->data);
					$this->set('errors',$errors.$ifJapanese);
				}
				else
					$this->set('errors','');

			}
			else {
				$this->redirect(array(
							'controller' => 'main',
							'action' => 'index'));
			}

		}

		private function convertMonthToString($month) {

			$monthString = 'January';
			$months = array(
							'January',
							'February',
							'March',
							'May',
							'June',
							'July',
							'August',
							'September',
							'October',
							'November',
							'December'
						);
			for($i = 0 ; $i < $month ; $i++) {
				if($i + 1 === $month) {
					$monthString = $months[$i];
				}
			}
			return $monthString;

		}

		public function profile($email = '') {

			$userid_from = $this->Session->read('usersid');
			
			if ($this->Session->read('usersid')) {
				$this->loadModel('User');
				if($email) {
					$profile = $this->User->findByEmail($email);
				} else {
					$profile = $this->User->findById($this->Session->read('usersid'));
				}
				$profile = (object)$profile['User'];
				$monthCreated = $this->convertMonthToString((int)substr($profile->created,5,2));
				$profile->created = $monthCreated . " " . (int)substr($profile->created,8,2) . ", " . substr($profile->created,0,4);
				$monthCreated = $this->convertMonthToString((int)substr($profile->last_login_time,5,2));
				$profile->last_login_time = $monthCreated . " " . (int)substr($profile->last_login_time,8,2) . ", " . substr($profile->last_login_time,0,4);
				$this->set('profile',$profile);
				$this->set('sessname',$this->Session->read('Auth.User.name'));


				
				$this->set('sessname',$this->User->find('all', 
				 		 array(
				       'fields' => array('users.name','users.id','users.last_login_time','users.created','users.modified'),
				       'joins' => array(array('table' => 'users',
				                               'alias' => 'users',
				                               'type' => 'INNER',
				                               'conditions' => array('users.id' => $userid_from)
				                         ))
				         )
				  ));

			} else {
				$this->redirect(array(
							'controller' => 'main',
							'action' => 'login'
							)
						);
			}

		}

		public function login() {

			if (!$this->Session->read("usersid")) {
				$this->set('login',0);
				if ($this->request->is('post')) {

					$this->loadModel('User');
					$this->User->set($this->request->data);
					$this->User->validate['email'] = array(
										'rule' => 'notEmpty',
										'message' => 'Email is required'
									);
					$this->User->validate['password'] = array(
										'rule' => 'notEmpty',
										'message' => 'Password is required'
									);
					$validate = $this->User->validates();
					if ($validate) {
						$email = $this->request->data['email'];
						$password = Security::hash($this->request->data['password']);
						$result = $this->User->findByEmailAndPassword($email, $password);
						if (!$result) {
							$this->Session->setFlash('Invalid email or password');
						} else {
							$this->User->id = $result['User']['id'];
							$loggedData = array(
									'password' => Security::hash($this->request->data['password']),
									'modified' => date('Y-m-d h:i:s'),
									'modified_ip' => $this->request->clientIp(),
									'last_login_time' => date('Y-m-d h:i:s'),
									);
							$this->User->save($loggedData);
							$this->Session->write('usersid', $result['User']['id']);
							$this->redirect(array(
											'controller' => 'main',
											'action' => 'index'
										));
						}
					} else {
						$this->Session->setFlash("Email and password are required");					
					}
					$data = array(
								'login' => 0,
								'email' => $this->request->data['email'],
								'password' => $this->request->data['password']);
					$this->set($data);
				}
			} else {
					$this->redirect(array(
								'controller' => 'main',
								'action' => 'index'
								)
							);
			}

		}

		public function completed() {

			$this->set('login',0);

		}

		public function changePassword() {

			if (!$this->Session->read('usersid')) {
				$this->redirect(array(
								'controller' => 'main',
								'login'));
			} else {
				if ($this->request->is('post')) {
					$this->loadModel('User');
					$this->User->set($this->request->data);
					$id = $this->Session->read('usersid');
					$password = Security::hash($this->request->data['current-password']);
					$this->User->validate['password']['Rule-1']['message'] = "New password must be at least 8 characters";
					if ($this->User->validates()) {
						$correct = $this->User->findByIdAndPassword($id, $password);
						if ($correct) {
							$this->User->id = $this->Session->read('usersid');
							$saveData = array(
											'password' => Sucurity::hash($this->request->data['password'])
										);
							$this->User->save($saveData);
							$message = "Successfully change password";
						} else {
							$message = "Invalid password";
						}
					} else {
						$message = "";
						foreach ($this->User->validationErrors as $error) {
							$message .= $error[0].", <br>";
						}
					}
					$this->set('message',$message);
					$this->set('currentPassword',$this->request->data['current-password']);
					$this->set('password',$this->request->data['password']);
					$this->set('cpassword',$this->request->data['cpassword']);
				}
			}

		}

		public function editProfile() {

			if ($this->Session->read('usersid')) {
				$this->loadModel('User');
				$errors = [];
				$profile = $this->User->findById($this->Session->read('usersid'));
				$profile = (object)$profile['User'];
				$this->set('profile',$profile);
				$this->set('sessname',$this->User->findById($this->Session->read('usersid')));
				$findWhereId = $this->User->find('all', array('conditions' => array('id' => $this->Session->read('usersid'))));
			}
			else {
				$this->redirect(array(
							'controller' => 'main',
							'action' => 'index'
						));
			}

		}

		public function editEmail() {

			if($this->Session->read('usersid')) {
				$this->loadModel('User');
				$error = "";
				$profile = $this->User->findById($this->Session->read('usersid'));
				$profile = $profile['User'];
				if($this->request->is('post')) {
					if($profile['email'] !== $this->request->data['email']) {
						$this->User->id = $this->Session->read('usersid');
						if($this->User->save($this->request->data)) {
							echo "<script>alert('Successfully updated email address');</script>";
							echo "<script>location.href = 'profile';</script>";
						} else {
							$error = $this->User->validationErrors['email'][0];
						}
					} else {
						$error = "Email can't be repeated";
					}
				}
				$profile = $this->User->findById($this->Session->read('usersid'));
				$profile = (object)$profile['User'];
				$profile->email = (isset($this->request->data['email'])) ? 
									$this->request->data['email'] : 
									$profile->email;
				$this->set('error',$error);
				$this->set('profile',$profile);
				$findWhereId = $this->User->find('all', array('conditions' => array('id' => $this->Session->read('usersid'))));
				$this->set('pass',$findWhereId);
				$findWhereId = $this->User->find('all', array('conditions' => array('id' => $this->Session->read('usersid'))));
				$this->set('sessname',$findWhereId);
			} else {
				$this->redirect(array(
							'controller' => 'main',
							'action' => 'login'
						));
			}
		}

		public function updateProfile() {


			date_default_timezone_set('Asia/Manila');
			$errors = '';

			if ($this->request->is('ajax')) {
				$this->autoRender = false;
				$this->loadModel('User');

				$User = $this->User->findById($this->Session->read('usersid'));
				$profile = (object)$User['User'];
				
				$this->User->id = $this->Session->read('usersid');
				//$errors = false;
				$gender = "";
				if($this->request->data['male']) {
					$gender = "M";
				} else if($this->request->data['female']) {
					$gender = "F";
				}
				$fileName = $profile->image;
				if($_FILES) {
					$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
					$fileName = uniqid().".".$ext;
				}
			//	$implodeBirthday = explode('|',$this->request->data['birthdate']);
			//	$newBirthday = $implodeBirthday[2].'-'.$implodeBirthday[1].'-'.$implodeBirthday[0];
			//	echo "<script>alert('$this->request->data['birthdate']')<script>";
				$data = array(
						'name' => $this->request->data['name'],
						'birthdate' => $this->request->data['birthdate'],
						'gender' => $this->request->data['gender'],
						'hubby' => $this->request->data['hubby'],
						'modified' => date('Y-m-d h:i:s'),
						'modified_ip' => $this->request->clientIp(),
						'image' => $fileName

					);
				if (!$this->User->save($data)) {
					$errors = $this->User->validationErrors;
				} else {
					if($_FILES) {
						$errors = '1';
						if (!empty($profile->image)) {
							unlink('img/users images/'.$profile->image);
						}
						move_uploaded_file($_FILES['file']['tmp_name'],'img/users images/'.$fileName);
				//		echo "<script>alert('sdsdsdsdsdsd')<script>";
						
					}
					
				}
				echo json_encode($errors);
					
			} else {
				$this->redirect(array(
								'controller' => 'main',
								'action' => 'login'
								)
							);
			}
		}

		public function logout() {

			$this->Session->delete('usersid');
			$this->redirect(array(
						'controller' => 'main',
						'action' => 'login'));

		}
		public function serch()
		{
			 $r = $_POST['recipient'];
			 $this->loadModel('User');

			 $userID = $this->Session->read('usersid');
			// $rs = $this->User->findByName('sharon');

			 $rs=$this->User->find('list', array('fields' => array('User.name','User.id'),'conditions' => array('User.name LIKE' => "$r%",'User.id !=' => $userID)));

			 
			// $rs = $this->User->find('all', array('conditions'=>array('User.name LIKE'=>'$r%')));
		//	$unserializedData =  unserialize($rs);
			echo json_encode($rs);
		}


		

	}
