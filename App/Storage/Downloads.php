<?php

namespace App\Storage;

use PPI\DataSource\ActiveQuery;
use App\Entity\SiteSetting as SettingEntity;
	
class Downloads extends ActiveQuery {
	
	protected $_meta = array(
		'conn'      => 'main',
		'table'     => 'download_entry',
		'primary'   => 'id',
		'fetchmode' => \PDO::FETCH_ASSOC
	);


	/**
	 * Create the download_entry record
	 * 
	 * @param  array    $data
	 * @return integer
	 */
	public function create(array $data) {
		
		if(!isset($data['created'])) {
			$data['created'] = time();
		}
		
		return parent::insert($data);
			
	}
	
}