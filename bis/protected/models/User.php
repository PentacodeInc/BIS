<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property integer $is_active
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 *
 * The followings are the available model relations:
 * @property Access[] $accesses
 * @property Announcement[] $announcements
 * @property Event[] $events
 * @property SliderImages[] $sliderImages
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('username, password, salt, first_name, middle_name, last_name', 'required'),
			array('first_name,middle_name,last_name','required'),
			// array('is_active', 'numerical', 'integerOnly'=>true),
			// array('username', 'length', 'max'=>20),
			// array('password, salt', 'length', 'max'=>50),
			// array('first_name, middle_name, last_name', 'length', 'max'=>35),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			// array('id, username, password, salt, is_active, first_name, middle_name, last_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'accesses' => array(self::HAS_MANY, 'Access', 'user_id'),
			'announcements' => array(self::HAS_MANY, 'Announcement', 'user_id'),
			'events' => array(self::HAS_MANY, 'Event', 'user_id'),
			'sliderImages' => array(self::HAS_MANY, 'SliderImages', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'is_active' => 'Is Active',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFullname(){
		return $this->last_name.', '.$this->first_name.' '.$this->middle_name;
	}

	public function beforeSave()
    {       
        if($this->isNewRecord) // only if adding new record
        {
        	$this->password = $this->username;
	    	$salt = openssl_random_pseudo_bytes(22);
			$salt = '$2a$%13$' . strtr(base64_encode($salt), array('_' => '.', '~' => '/'));
			$password_hash = crypt($this->password, $salt); 
			$this->password = $password_hash; 
			$this->is_active = 1;
        }
 		return parent::beforeSave();
    }
}
