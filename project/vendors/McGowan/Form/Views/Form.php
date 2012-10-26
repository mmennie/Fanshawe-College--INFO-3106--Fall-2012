<?php

namespace McGowan\Form\Views
{
	defined('IN_LIBRARY') or exit;
	
	class Form extends \McGowan\HTML\Views\Element
	{
		public function __construct($action = '', $method = 'POST')
		{
			parent::__construct('form');
			
			$this->attr('action', $action);
			$this->attr('method', $method);
		}
		
		protected function defaultAttributes()
		{
			return array_merge(
				parent::defaultAttributes(),
				array(
					'action' => '',
					'method' => 'POST'
				)
			);
		}
	}
}