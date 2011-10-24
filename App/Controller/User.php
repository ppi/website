<?php
class APP_Controller_User extends PPI_Controller_User {
	function __construct() {
		parent::__construct();
		$this->oSession 	= $this->getSession();
		$this->oForm 		= new PPI_Model_Form();
		$this->oUser 		= new APP_Model_User();
		$this->authData 	= $this->oSession->getAuthData();
	}

	function index() {
		$this->redirect('user/home');
	}

	function profile() {
		$iUserID = (int) $this->_input->get('id', 0);
		if($iUserID < 1) {
			throw new PPI_Exception('No UserID Found. No profile information to display.');
		}
		// quote your inputs using PPI_Model->quote()
		$aUserInfo = $this->oUser->getList('id = '.$this->oUser->quote($iUserID))->fetch();
		if(empty($aUserInfo)) {
			throw new PPI_Exception('Unable to obtain profile information');
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
		parent::login();
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
		parent::register();
	}

	function recover() {
		parent::recover();
	}

	function logout() {
		$this->oUser->logout();
		$this->redirect('');
	}



}