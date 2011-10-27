<?php
namespace App\Model;
use PPI\Core;
class UserNew {
	
	protected $_conn = null;
	
	protected $_table = 'users';
	
	function __construct() {
		
		$this->_conn = Core::getDataSourceConnection('main');
		
	}
	
	function insert(array $data) {
		$this->_conn->insert($this->_table, $data);
		return $this->_conn->lastInsertId();
	}
	
	function find($userID) {
		return $this->_conn->fetchAssoc('SELECT * FROM ' . $this->_table . ' WHERE id = ?', array($userID));
	}
	
	/**
	 * Get the users authentication object.
	 *
	 * @return \App\Auth\Sql
	 */
	function getAuth() {
			$config = Core::getConfig();
			return new \App\Auth\Sql(array(
					'salt'          => $config->system->userAuthSalt,
					'usernameField' => $config->system->usernameField,
					'model'         => $this,
			));
	}
	
}