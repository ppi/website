<?php

namespace App\Storage;

use PPI\DataSource\ActiveQuery;
use App\Entity\SiteSetting as SettingEntity;
	
class SiteSettings extends ActiveQuery {
	
	protected $_meta = array(
		'conn' => 'main',
		'table' => 'site_settings',
		'primary' => 'id',
		'fetchmode' => \PDO::FETCH_ASSOC
	);
	
	public function getSettingByKey($key) {
		
		$row = $this->_conn->createQueryBuilder()
			->select('ss.*')
			->from($this->_meta['table'], 'ss')
			->andWhere('ss.`key` = :setting_key')
			->setParameter(':setting_key', $key)
			->execute()
			->fetch();
		
		if($row === false) {
			throw new \Exception();
		}
		
		return new SettingEntity($row);
		
	}
	
}