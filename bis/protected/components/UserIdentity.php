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
		$record=User::model()->findByAttributes(array('username'=>$this->username));
        $salt = openssl_random_pseudo_bytes(22);
        $salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
        $password_hash = crypt($this->password, $salt);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==$password_hash)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
        	$this->setState('id',$record->id);
        	$this->setState('toChangePassword',$record->username===$this->password);
       		$this->errorCode=self::ERROR_NONE;
   		}
        
		return !$this->errorCode;
	}
}