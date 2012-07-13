<?php
namespace App\Controller;
class Home extends Application {

	/**
	 * Homepage Action
	 */
	function index() {
		$downloadCount = $this->getDownloadCount();
		$this->addCSS('light/home');
		$this->addJS('bootstrap/dropdown', 'home');
		$this->render('home/index', compact('downloadCount'));
	}

	/**
	 * Obtain the download count Action
	 */
	public function download_count() {
		die( (string) $this->getDownloadCount());
	}

	/**
	 * Incremement the download count Action
	 */
	public function increment_count() {
		
		// Store the download record for further tracking
		$this->getDownloadsStorage()->create(array(
			'ip_address' => $this->getRemote('ip')
		));
		
		// Increment the download count
		$newCount = $this->getDownloadCount() + 1;
		$this->setDownloadCount($newCount);
		die( (string) $newCount);
	}

	/**
	 * Get the download count
	 * 
	 * @return integer
	 */
	protected function getDownloadCount() {
		
		$cache = $this->getCache();
		$cacheKey = 'download_count';
		if($cache->exists($cacheKey)) {
			$count = $cache->get($cacheKey);
		} else {
			$count = $this->getSettingsStorage()->getSettingByKey('download_count')->getValue();
			$cache->set($cacheKey, $count);
		}
		
		return $count;
	}

	/**
	 * Set the download count
	 * 
	 * @param integer $newCount
	 */
	protected function setDownloadCount($newCount) {
		$this->getCache()->set('download_count', $newCount);
	}

	/**
	 * Get the site settings storage
	 * 
	 * @return \App\Storage\SiteSettings
	 */
	protected function getSettingsStorage() {
		return new \App\Storage\SiteSettings();
	}

	/**
	 * Get the downloads storage
	 * 
	 * @return \App\Storage\Downloads
	 */
	protected function getDownloadsStorage() {
		return new \App\Storage\Downloads();
	}

}
