<?php
class Post extends AppModel{

	public $validate = array(
		'title' => array(
			'rule' => 'notBlank',
		),
		'body' => array(
			'rule' => 'notBlank'
		)
	);

	public function beforeSave($options = array())
	{
		return true;
	}
}
