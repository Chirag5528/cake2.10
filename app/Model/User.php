<?php
App::uses('AppModel','Model');

class User extends AppModel
{
	public $name = 'users';

	public $validate = array(
		'first_name' => array(
			'rule' => 'notBlank',
			'allowEmpty' => false,
			'required' => true,
		)
	);

}
