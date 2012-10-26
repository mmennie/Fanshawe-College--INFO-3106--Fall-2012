<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

class Subject {
	private $_listeners = array();
	
	public $stop_updating = false;
	
	public function __construct() {
	}
	
	public function attachListener(IListener &$listener) {
		if( false === array_search($listener, $this->_listeners) ) {
			$this->_listeners[count($this->_listeners)] = &$listener;
			return true;
		}
		
		return false;
	}
	
	public function detachListener(IListener $listener) {
	}
	
	public function run($event = null, array &$args = array()) {
		$this->stop_updating = false;
		foreach( $this->_listeners as $key => &$listener ) {
			if( $this->stop_updating ) {
				break;
			}
		
			$listener->update($this, $event, $args);
		}
	}
}

interface IListener
{
	public function update(Subject &$subject, $event = null, array &$args = array());
}

abstract class BaseListener implements IListener {
	public $last_event = null;
	public function update(Subject &$subject, $event = null, array &$args = array()) {
		$this->last_event = $event;
		// print get_class($this) . ' --> Event: ' . $event . ' --> ' . print_r( $subject, true ) . '<br />';
	}
}

class ListenerA extends BaseListener {
	public function update(Subject &$subject, $event = null,  array &$args = array()) {
		if( $event == 'second-event' ) {
			$subject->stop_updating = true;
		}
		
		$args = array();
		
		parent::update($subject, $event);
		
	}
}
class ListenerB extends BaseListener { }


$subject = new Subject();

$a = new ListenerA();
$subject->attachListener($a);

$b = new ListenerB();
$subject->attachListener($b);


print 'Example of Events and the Observer pattern, in most basic form.<br /><br />';

$args = array('value');

$subject->run('first-event', $args);

print $a->last_event . '<br />';
print_r( $args );

exit;

$subject->run('second-event');

print $a->last_event . '<br />';

$subject->run('third-event');

print $a->last_event . '<br />';












