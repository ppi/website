<?php
namespace App\Controller;
use PPI\Core, PPI\Core\CoreException;
class User extends \PPI\Controller\User {
	
	function preDispatch() {
		$this->oSession 	= $this->getSession();
		$this->oForm 		= new \PPI\Model\Form();
		$this->oUser 		= new \App\Model\User();
		$this->authData 	= $this->oSession->getAuthData();
	}

	function index() {
		$this->redirect('user/home');
	}

	function profile() {
		$iUserID = (int) $this->_input->get('id', 0);
		if($iUserID < 1) {
			throw new CoreException('No UserID Found. No profile information to display.');
		}
		// quote your inputs using PPI_Model->quote()
		$aUserInfo = $this->oUser->getList('id = '.$this->oUser->quote($iUserID))->fetch();
		if(empty($aUserInfo)) {
			throw new CoreException('Unable to obtain profile information');
		}
		$aViewVars['aUserInfo'] = $aUserInfo;
		$aViewVars['aLanguages'] = array();
		$this->load('user/profile', $aViewVars);
	}

	function dashboard() {
		$this->load('user/dashboard');
	}

	function home() {

		$this->load('user/home');
	}

	function login() {
		
		if($this->isLoggedIn()) {
			$this->postLoginRedirect();
		}
		
		$formError = '';
		
		if($this->is('post')) {
			
			$email       = $this->post('email');
			$password    = $this->post('password');
			$userModel   = new \App\Model\User();
			$authAdapter = $userModel->getAuth();
			
			if($authAdapter->verify($email, $password)) {
				
				$user = $userModel->findByField('email', $email);
				if(array_key_exists('password', $user)) {
					unset($user['password']);
				}
				$user['role_name'] = \PPI\Helper\User::getRoleNameFromID($user['role_id']);
				$user['role_name_nice'] = \PPI\Helper\User::getRoleNameNice($user['role_name']);
				$this->getSession()->setAuthData($user);
				$this->postLoginRedirect();
				
			} else {
				$formError = 'Login Failed.';
			}

		}
		
		$form = new \PPI\Form();
		$this->addCSS('form', 'login');
		$this->render('user/login', compact('formError', 'form'));
		
	}

	
	function postLoginRedirect() {
		switch($this->getAuthData(false)->role_name) {
			case 'member':
				$this->redirect('');	
				break;
				
			case 'administrator':
			case 'developer':
				$this->redirect('admin');
				break;
		}
		
	}
	
	
	function register() {
		
		if($this->is('post')) {
			
			$userModel = new \App\Model\UserNew();
			$authAdapter = $userModel->getAuth();
			
			$userID = $userModel->insert(array(
				'first_name' => $this->post('fname'),
				'last_name'  => $this->post('lname'),
				'email'      => $this->post('email'),
				'password'   => $authAdapter->encrypt($authAdapter->getSalt(), $this->post('password')),
				'role_id'    => \PPI\Helper\User::getRoleIDFromName($this->getConfig()->system->defaultUserRole),
				'created'    => time()
			));
			
			$user = $userModel->find($userID);
			if(empty($user)) {
				throw new CoreException('Error logging in after registration: Unable to find new user\'s data.');
			}
			if(isset($user['password'])) {
				unset($user['password']);
			}
			
			$user['role_name']      = \PPI\Helper\User::getRoleNameFromID($user['role_id']);
			$user['role_name_nice'] = \PPI\Helper\User::getRoleNameNice($user['role_name']);
			;
			$this->getSession()->setAuthData($user);
			$this->setFlash('Successfully registered. You are now logged in.');
			
			$this->postLoginRedirect();
			
		}
		
		
		$form = new \PPI\Form();
		$this->addCSS('form', 'register');
		$this->render('user/register', compact('form', 'formError'));
		
	}

	function recover() {
		parent::recover();
	}

	function logout() {
		$this->oUser->logout();
		$this->redirect('');
	}



}