<?php
class APP_Model_Audit extends APP_Model_Application {
	
	protected $_table = 'ppi_audit';
	protected $_primary = 'id';
	
	function __construct() {
		parent::__construct($this->_table, $this->_primary);
	}
	
}