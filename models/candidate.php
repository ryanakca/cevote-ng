<?php
class Candidate extends AppModel {

	var $name = 'Candidate';
	var $validate = array(
		'name' => array('notempty'),
		'votes' => array('numeric')
	);

        var $order = 'votes';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Position' => array(
			'className' => 'Position',
			'foreignKey' => 'position_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
