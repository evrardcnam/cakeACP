<?php
class Livreur extends AppModel {
	var $name = 'Livreur';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'JosUser' => array(
			'className' => 'JosUser',
			'foreignKey' => 'User.id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>