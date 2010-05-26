<?php
class User extends AppModel {

	var $name = 'User';
	var $validate = array(
		'username' => array('alphanumeric'),
		'has_voted' => array('boolean')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>