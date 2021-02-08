<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public function beforeSave($options = array())
	{
		foreach( array_keys( $this->data[$this->alias] ) as $keys ){
			if(!empty($this->data[$this->alias][$keys]))
			{
				$this->data[$this->alias][$keys] = htmlspecialchars( htmlentities( strip_tags($this->data[$this->alias][$keys]) ) );
			}
		}
		return parent::beforeSave($options);
	}
	public $validate = array(
		'CaptchaCode' => array(
			'rule' => 'checkIsCaptchaValid',
			'message' => 'Please retype the characters from the picture'
		)
	);

	// simply return the Captcha validation status
	public function checkIsCaptchaValid($check) {
		$value = array_values($check);
		$value = $value[0];
		return captcha_validate($value);
	}

	public function schema($field = false) {
		return array (
			'name' => array('type' => 'string', 'length' => 64),
			'email' => array('type' => 'string', 'length' => 64),
			'message' => array('type' => 'text', 'length' => 256),
			'subject' => array('type' => 'string', 'length' => 128),
		);
	}

}
