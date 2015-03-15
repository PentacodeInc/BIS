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
	const ERROR_USERNAME_NOT_ACTIVE = 3;	

	public function authenticate()
	{   

		$record=User::model()->findByAttributes(array('username'=>$this->username));
		if(!empty($record))
        	$password_hash = crypt($this->password, $record->salt);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->password!==$password_hash)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else if($record->isActive == 0)
        	$this->errorCode=self::ERROR_USERNAME_NOT_ACTIVE;
        else
        {
        	$this->setState('id',$record->id);
        	$this->setState('toChangePassword',$record->username===$this->password);
        	$this->setState('isAdmin',$record->is_admin);
       		$this->errorCode=self::ERROR_NONE;
   		}
        
		return !$this->errorCode;
	}



}