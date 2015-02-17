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
	public $old_password;
	public $new_password;
	public $repeat_password;
	public $fullName;
	public $modules;

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
			array('username, is_active, first_name, middle_name, last_name, fullName', 'safe', 'on'=>'search'),
			array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
			array('old_password', 'findPasswords', 'on' => 'changePwd'),
			array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
			);
	}

	public function findPasswords($attribute, $params)
	{
		$user = User::model()->findByPk(Yii::app()->getRequest()->getParam('id'));
		$salt = openssl_random_pseudo_bytes(22);
		$salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
		$password_hash = crypt($this->old_password, $salt);
        if ($password_hash !== $user->password) //remove incription? or encrypt ung user->password
        $this->addError($attribute, 'Old password is incorrect.');
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
			'is_active' => 'Status',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'fullName'=>'Full Name',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('first_name',$this->fullName,false, 'OR');
		$criteria->compare('middle_name',$this->fullName,false, 'OR');
		$criteria->compare('last_name',$this->fullName,false, 'OR');
		$criteria->compare('concat(first_name, " ", last_name)', $this->fullName,false, 'OR');
		$criteria->compare('concat(last_name, " ", first_name)', $this->fullName,false, 'OR');

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
		if ($this->last_name && $this->first_name){
			return ucwords($this->last_name).', '.ucwords($this->first_name).' '.ucwords($this->middle_name);
		}else{
			return "";
		}
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

    public function getAll(){
    	return User::model()->findAll();
    }

    public function getColumns(){
    	$columns = array();
    	array_push($columns,  
    		array(
	    		'name'=>'fullName',
	    		'value' => 'CHtml::link($data->getFullName(),array("user/update", "id"=>$data->id))',
	    		'type' => 'raw',
	    		),
    		'username',
	    	array(
	    		'name'=>'is_active',
	    		'value' => '$data->is_active?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
	    		'filter' => array('0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
	    		)
    	);
    	foreach (User::getAll() as $value) {
    		$columns = Module::generateModuleColumns($value->id,$columns);
    	}

    	array_push($columns, 
	    		array(
	    		'class'=>'CButtonColumn',
	    		'template'=>'{reset}',
	    		'buttons' => array(
	    			'reset' => array(
	    				'label' => 'Reset Account', 
	    				'options' => array(
	    					'confirm' => 'Are you sure you want to reset password?',
	    					),
	    				'url' => 'CHtml::normalizeUrl(array("user/resetPassword", "id"=>$data->id))', 
	    				'imageUrl' => Yii::app()->baseUrl . '/themes/images/reset.png',
	    				)
	    			)
	    		)
    		);
    	return $columns;
    }
}
