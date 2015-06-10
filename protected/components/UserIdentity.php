<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$all = Usuario::model()->findAll();
		$users = CHtml::listData($all, 'email', 'senha');
		//var_dump($users[$this->username]);
		//echo md5($this->password);die;
		if(!isset($users[$this->username])){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		elseif($users[$this->username]!=md5($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else{
			$t = Usuario::model()->findByAttributes(array('senha'=>$users[$this->username]));
			if(!empty($t)){
				$this->setState('avatar', $t->avatar);
			}
			//var_dump($users);die('ij');
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}