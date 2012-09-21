<?php

defined('IN_APPLICATION') or exit;

require_once 'Shape.php';

class Pentagon extends Shape {
  public function getName() {
    return 'Pentagon';
  }
  
  public function getNumberOfSides() {
    return 5;
  }
  
  public function setDimensions(array $dimensions) {
	$dimensions_count = count($dimensions);
	if( 5 != $dimensions_count ) {
		throw new Exception('You must specify exactly all five dimensions for the pentagon.');
	}
	
	$this->_dimensions = array();
	for( $i = 0; $i < $this->getNumberOfDimensions(); ++$i ) {
		$this->_dimensions[] = $dimensions[$i];
	}
  }
}