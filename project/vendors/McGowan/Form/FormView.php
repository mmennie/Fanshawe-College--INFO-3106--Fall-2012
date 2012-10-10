<?php

namespace McGowan\Form
{
	defined('IN_LIBRARY') or exit;
	
	class FormView extends View
	{
	
		public function __construct()
		{
			parent::__construct('form.tmpl.php');
		}
		
	}
}