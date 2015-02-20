<?php

/**
 * This is the model class for table "personal_info".
 *
 * The followings are the available columns in table 'personal_info':
 * @property integer $id
 * @property integer $barangay_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birthdate
 * @property integer $gender
 * @property string $house_num
 * @property string $street
 * @property string $provincial_address
 * @property integer $is_head
 * @property integer $household_id
 * @property string $birthplace
 * @property integer $civil_status
 * @property string $spouse_name
 * @property integer $height
 * @property integer $weight
 * @property string $citizenship
 * @property string $religion
 * @property string $contact_num
 * @property string $email_address
 * @property string $photo_filename
 * @property string $residency_start
 * @property string $residency_end
 * @property string $residency_type
 * @property string $last_update_datetime
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property EducationalInfo[] $educationalInfos
 * @property EmploymentInfo[] $employmentInfos
 * @property FamilyInfo[] $familyInfos
 * @property GovernmentInfo[] $governmentInfos
 * @property Household $household
 * @property User $user
 */
class PersonalInfo extends CActiveRecord
{
	public $fullName;
	
	public function getGenders(){
		return array(0 => 'Female', 1 => 'Male');
	}

	public function getCivilStatus(){
		return array(0 => 'Single',	1 => 'Married', 2 => 'Divorced', 3 => 'Separated' ,4 => 'Widowed');
	}

	public function getIsHead(){
		return array(0 => 'No', 1 => 'Yes');
	}

	public function getResidencyType(){
		return array(0 => 'Renter', 1 => 'Owner');
	}

	public function getResidencyStatus(){
		return empty($this->residency_end) ? 'Active' : 'Inactive';
	}

	public function getFullname(){
		if ($this->last_name && $this->first_name){
			return ucwords($this->last_name).', '.ucwords($this->first_name).' '.ucwords($this->middle_name);
		}else{
			return "";
		}
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'personal_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, middle_name, last_name, birthdate, house_num, street, household_id, birthplace, height, weight, citizenship, religion, contact_num, residency_type', 'required'),
			array('barangay_id, gender, is_head, household_id, civil_status, height, weight, user_id', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name', 'length', 'max'=>35),
			array('house_num', 'length', 'max'=>25),
			array('street, citizenship, religion', 'length', 'max'=>100),
			array('spouse_name', 'length', 'max'=>120),
			array('contact_num', 'length', 'max'=>45),
			array('email_address', 'length', 'max'=>254),
			array('photo_filename', 'length', 'max'=>200),
			array('residency_type', 'length', 'max'=>10),
			array('provincial_address, residency_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, barangay_id, first_name, middle_name, last_name, birthdate, gender, house_num, street, provincial_address, is_head, household_id, birthplace, civil_status, spouse_name, height, weight, citizenship, religion, contact_num, email_address, photo_filename, residency_start, residency_end, residency_type, last_update_datetime, user_id', 'safe', 'on'=>'search'),
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
			'educationalInfos' => array(self::HAS_MANY, 'EducationalInfo', 'personal_info_id'),
			'employmentInfos' => array(self::HAS_MANY, 'EmploymentInfo', 'personal_info_id'),
			'familyInfos' => array(self::HAS_MANY, 'FamilyInfo', 'personal_info_id'),
			'governmentInfos' => array(self::HAS_MANY, 'GovernmentInfo', 'personal_info_id'),
			'household' => array(self::BELONGS_TO, 'Household', 'household_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'barangay_id' => 'Barangay',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'birthdate' => 'Birthdate',
			'gender' => 'Gender',
			'house_num' => 'House Num',
			'street' => 'Street',
			'provincial_address' => 'Provincial Address',
			'is_head' => 'Is Head',
			'household_id' => 'Household',
			'birthplace' => 'Birthplace',
			'civil_status' => 'Civil Status',
			'spouse_name' => 'Spouse Name',
			'height' => 'Height',
			'weight' => 'Weight',
			'citizenship' => 'Citizenship',
			'religion' => 'Religion',
			'contact_num' => 'Contact Num',
			'email_address' => 'Email Address',
			'photo_filename' => 'Photo Filename',
			'residency_start' => 'Residency Start',
			'residency_end' => 'Residency End',
			'residency_type' => 'Residency Type',
			'last_update_datetime' => 'Last Update Datetime',
			'user_id' => 'User',
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
	public function search($letter = "")
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('first_name',$this->fullName,false, 'OR');
		$criteria->compare('middle_name',$this->fullName,false, 'OR');
		$criteria->compare('last_name',$this->fullName,false, 'OR');
		$criteria->compare('concat(first_name, " ", last_name)', $this->fullName,false, 'OR');
		$criteria->compare('concat(last_name, " ", first_name)', $this->fullName,false, 'OR');
		$criteria->compare('street',$this->street,true);
		if(isset($letter))
			$criteria->compare('last_name',$letter);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PersonalInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{       
        if($this->isNewRecord) // only if adding new record
        {
        	$this->user_id = Yii::app()->user->id;
        	$timestamp=new DateTime();
        	$this->last_update_datetime=$timestamp->format('Y-m-d H:i:s');;
        }
        return parent::beforeSave();
    }
}
