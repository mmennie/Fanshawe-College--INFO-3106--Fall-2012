<?php

namespace McGowan\Form
{
	defined('IN_LIBRARY') or exit;
	
	class View extends \McGowan\View
	{
		public function __construct($filename)
		{
			parent::__construct();
			
			$this->template_path( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates' );
			$this->template_file($filename);
		}
	}

}