<?php
class Post extends AppModel{

	public $validate = array(
		'title' => array(
			'rule' => 'notBlank',
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Title is required'
		),
		'body' => array(
			'rule' => 'notBlank',
			'required' => true,
        	'allowEmpty' => false,
			'message' => 'Body Cannot be blank'
		)
	);
}
