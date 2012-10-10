<?php

namespace McGowan\Form
{
	/**
	 * @ignore
	 */
	defined('IN_LIBRARY') or exit;
	
	/**
	 *
	 */
	class Form extends \McGowan\Object
	{
		public static function factory(/* arguments to be placed here, sep'ed by comma */)
		{
			$form = new self();
			/* Do any initializing required with any arguments that
			   your library specifies in this method signature */
			
			return $form;
		}
		
		protected $_view;
		
		public function __construct(/* arguments here as well if you so wish */)
		{
			/* do any initializing required */
			$this->_view = new FormView();
		}
		
	}
}