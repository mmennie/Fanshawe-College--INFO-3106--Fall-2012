<?php

defined('IN_APPLICATION') or exit;

require_once 'Shape.php';

class Triangle extends Shape {
  public function getName() {
    return 'Triangle';
  }
  
  public function getNumberOfSides() {
    return 3;
  }
  
  public function setDimensions(array $dimensions) {
	$dimensions_count = count($dimensions);
	if( 2 > $dimensions_count || 3 < $dimensions_count ) {
		throw new Exception('Triangle dimensions array must have either two or three elements.');
	}
	
	if( 2 == $dimensions_count ) {
		$this->_dimensions = array( $dimensions[0], $dimensions[1] );
		$this->_dimensions[3] = sqrt( pow($this->_dimensions[0], 2) + pow($this->_dimensions[1], 2));
	}
	else {
		$this->_dimensions = array();
		for( $i = 0; $i < $this->getNumberOfDimensions(); ++$i ) {
			$this->_dimensions[] = $dimensions[$i];
		}
	}
  }
}