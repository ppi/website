<?php

/* This Model is used so that the developer can create
 * their own DB API that will be shared across the application
 */
class APP_Model_Application extends PPI_Model {

	function __construct($p_iTableName = "", $p_iTableIndex = "", $p_sBdbInfo = "", $p_iRecordID = 0) {
		parent::__construct($p_iTableName, $p_iTableIndex, $p_sBdbInfo, $p_iRecordID);
	}

	/**
	 * Convert the result of PPI_Model->getList() to a dropdown result
	 *
	 * @param array $getList
	 */
	function convertGetListToDropdown($getList, $descriptionKey) {
		$newArray = array();
		$rows = (is_object($getList)) ? $getList->fetchAll() : $getList;
		foreach($rows as $key => $val) {
			if(is_array($descriptionKey)) {
				$fields = array();
				$desc = '';
				foreach($descriptionKey as $descVal) {
					$desc .= (!array_key_exists($descVal, $val)) ? $descVal : $val[$descVal];
				}
			} else {
				$desc = ($descriptionKey == ' ') ? '&nbsp;' : $val[$descriptionKey];
			}


			$newArray[$val[$this->sTableIndex]] = $desc;
		}
		return $newArray;
	}

	/**
	 * Convert a timestamp into the users locale.
	 * If they're a guest, we get the default from the config, otherwise we get session data and obtain the users default
	 *
	 * @param integer $p_iTimestamp Timestamp to be converted, can be a string as it's casted to an integer
	 * @return string The new format depending on the user preferences
	 */
	function convertTimestampToUserDate($p_iTimestamp) {
		$oSession = $this->getSession();
		$aAuthInfo = $oSession->getAuthData();
		// They're logged in
		if(count($aAuthInfo) > 0) {
			$sDateFormat = $aAuthInfo['date_format'];
		// They're a guest, so let's get the default format from the config, but we check that it's in the config too!
		} else {
			global $oConfig;
			if(!isset($oConfig->layout->defaultDateFormat)) {
				throw new PPI_Exception('Unable to obtain default date format, check your configuration');
			}
			$sDateFormat = $oConfig->layout->defaultDateFormat;
		}
		return date($sDateFormat, (int) $p_iTimestamp);
	}

}