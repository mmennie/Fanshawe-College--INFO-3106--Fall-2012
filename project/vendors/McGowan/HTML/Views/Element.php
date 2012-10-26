<?php
/**
 * 
 */
namespace McGowan\HTML\Views
{
	/**
	 * @ignore
	 */
	defined('IN_LIBRARY') or exit;
	
	/**
	 *
	 */
	class Element extends \McGowan\View
	{
		private $_name = '';
		private $_is_empty = false;
		private $_attributes = array();
		private $_children = array();
	
		public function __construct($name)
		{
			parent::__construct(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'element.tmpl.php', array());
			
			$this->name($name);
			
			$this->_attributes = $this->defaultAttributes();
		}
		
		final public function name($value = null)
		{
			if( null === $value ) {
				return $this->_name;
			}
			
			$this->_name = trim($value);
			return $this;
		}
		
		final public function attributes()
		{
			return $this->_attributes;
		}
		
		final public function attr($name, $value = null)
		{
			if( null === $value ) {
				return isset($this->_attributes[$name]) ? $this->_attributes[$name] : null;
			}
			
			$this->_attributes[$name] = $value;
			return $this;
		}
		
		public function addChild(Element $child)
		{
			if( false === array_search($child, $this->_children) ) {
				$this->_children[] = $child;
				return true;
			}
			
			return false;
		}
		
		public function removeChild(Element $child)
		{
			/* You can implement this ... */
		}
		
		public function isEmpty($value = null)
		{
			if( null === $value ) {
				return $this->_is_empty;
			}
			
			$this->_is_empty = (bool) $value;
			return $this;
		}
		
		protected function beforeRender()
		{
			$this->set('children', $this->_children);
			$this->set('attributes', $this->renderAttributes());
			$this->set('is_empty', $this->isEmpty());
			
			parent::beforeRender();
		}
		
		protected function defaultAttributes()
		{
			/* You can implement the rest of the default attributes available to
			   all HTML elements */
			return array(
				'id' => ''
			);
		}
		
		private function renderAttributes()
		{
			$attributes = array();
			foreach( $this->_attributes as $key => $value )
			{
				if( empty($value) ) {
					continue;
				}
				
				$attributes[] = $key . '="' . $value . '"';
			}
			
			return implode(' ', $attributes);
		}
	}
}