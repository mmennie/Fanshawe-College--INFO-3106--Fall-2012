<?php
/**
 * MyClass
 * 
 * Provide a description of the class here...
 */
class MyClass extends Factory {
	/**
	 * factory
	 *
	 * Description of the method.
	 * 
	 * @access public
	 * @param void
	 * @return MyClass Returns a new instance of MyClass.
	 */
	public static function factory() {
		print __METHOD__ . '::' . __LINE__ . '<br />';
		return new MyClass();
	}
	
	protected function __construct() {
		print __METHOD__ . '::' . __LINE__ . '<br />';
	}
	
	public function __destruct() {
		print __METHOD__ . '::' . __LINE__ . '<br />';
	}
	
}