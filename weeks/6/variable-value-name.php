<?php

class POD implements Countable {
	private $_data = array();
	private $_count = 0;
	
	public function __construct() {
	}
	
	public function __get($var) {
		print __METHOD__ . '<br />';
		return isset($this->_data[$var]) ? $this->_data[$var] : null;
	}
	
	public function __set($var, $val) {
		print __METHOD__ . '<br />';
		if( !isset($this->_data[$var]) ) {
			++$this->_count;
		}
		$this->_data[$var] = $val;
	}
	
	public function __isset($var) {
		print __METHOD__ . '<br />';
		return isset($this->_data[$var]);
	}
	
	public function __unset($var) {
		print __METHOD__ . '<br />';
		if( isset($this->_data[$var]) ) {
			unset($this->_data[$var]);
			--$this->_count;
		}
	}
	
	public function count() {
		// print __METHOD__ . '<br />';
		// return $this->_count;
		return count($this->_data);
	}
}

$pod = new POD();
$pod->var1 = 'val1';
$pod->var2 = 'val2';

if( isset($pod->var3) ) {
	print 'var3 exists<br />';
}
else {
	print 'var3 does not exist.<br />';
}

unset($pod->var1);

print count($pod) . '<br />';

// print_r( $pod );

print '<br /><br /><br />';



class MyClass {

	private $variable = 'hello';
	private $hello = 'bye';
	
	public function __construct()
	{
		print $this->variable . '<br />';
		
		// $this->hello
		print $this->{$this->variable} . '<br />';
		
		// $this->bye();
		$this->{$this->hello}();
	}
	
	public function bye() {
		print 'Bye' . '<br />';
	}
	
	public function __get($var) {
		return isset($this->$var) ? $this->$var : null;
	}
	
	public function __set($var, $val) {
		$this->$var = $val;
	}
}

$my_variable = 'hello';

$hello = 'bye';

// works as suggested - prints Hello
print $my_variable . '<br />';

// uses the value of my_variable to construct the new variable
// which this variable will then be $hello. Therefore, we have bye printed
print $$my_variable . '<br />';

$class = new MyClass();
print 'Magic method call: ' . $class->variable . '<br />';

$class->hello = 'Hello World, bye world';
print $class->hello . '<br />';


$class->my_new_var = 'My new var';

print_r( $class );