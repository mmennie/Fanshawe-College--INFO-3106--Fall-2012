<?php
/**
 * Provide an example using a class
 * to demonstrate the $this-> operator while
 * referencing an instance of class's private member variables or methods
 * within another.
 */
 
 class MyClass {
	private $var = 'private';
	
	public function __construct() {
		
	}
	
	public function run(MyClass $o) {
		print $o->var . '<br />';
		$o->_private_run();
	}
	
	private function _private_run() {
		print __METHOD__;
	}
 }
 
 $o1 = new MyClass;
 $o2 = new MyClass;
 
 $o1->run($o2);