<?php
namespace App\Controller;
class Downloads extends Application {

	function index() {

		$downloads = array();
		$downloads[] = array(
			'title' => 'PPI Framework',
			'shortdesc' => 'Open Source PHP Framework',
			'desc' => 'PPI is an Open Source Framework that streamlines development; both individual and enterprise. Providing you with the essentials you need, the things, you want, and the freedom to work your own way. Leveraging PPI is fast, easy, and tuned for everything from Microblogging to E-Commerce and more.',
			'tarlink' => 'https://github.com/ppi/framework/tarball/master',
			'ziplink' => 'https://github.com/ppi/framework/zipball/master',
			'srclink' => 'https://github.com/ppi/framework',
		);

		$downloads[] = array(
			'title' => 'PPI Skeleton Application',
			'shortdesc' => 'The PPI skeleton application',
			'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
			'tarlink' => 'https://github.com/ppi/skeletonapp/tarball/master',
			'ziplink' => 'https://github.com/ppi/skeletonapp/zipball/master',
			'srclink' => 'https://github.com/ppi/skeletonapp',
		);


		$downloads[] = array(
			'title' => 'PPI Issue Tracker',
			'shortdesc' => 'The issue tracker for the PPI project.',
			'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
			'tarlink' => 'https://github.com/ppi/tracker/tarball/master',
			'ziplink' => 'https://github.com/ppi/tracker/zipball/master',
			'srclink' => 'https://github.com/ppi/tracker',
		);

		$downloads[] = array(
			'title' => 'PPI Documentation',
			'shortdesc' => 'PPI documentation project',
			'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
			'tarlink' => 'https://github.com/ppi/docs/tarball/master',
			'ziplink' => 'https://github.com/ppi/docs/zipball/master',
			'srclink' => 'https://github.com/ppi/docs',
		);

		$downloads[] = array(
			'title' => 'PPI Website',
			'shortdesc' => 'The repository for the website at ppiframework.com',
			'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
			'tarlink' => 'https://github.com/ppi/website/tarball/master',
			'ziplink' => 'https://github.com/ppi/website/zipball/master',
			'srclink' => 'https://github.com/ppi/website',
		);

		$this->addCSS('downloads');
		$this->render('downloads/index', compact('downloads'));
	}

}
