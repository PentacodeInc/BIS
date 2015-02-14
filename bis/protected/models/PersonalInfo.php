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
 * @property string $address
 * @property integer $is_head
 * @property integer $household_id
 * @property string $provincial_address
 * @property string $birthplace
 * @property integer $civil_status
 * @property string $spouse_name
 * @property integer $height
 * @property integer $weight
 * @property string $citizenship
 * @property string $religion
 * @property string $contact_num
 * @property string $email_address
 * @property string $residence_year
 *
 * The followings are the available model relations:
 * @property EducationalInfo[] $educationalInfos
 * @property EmploymentInfo[] $employmentInfos
 * @property FamilyInfo[] $familyInfos
 * @property GovernmentInfo[] $governmentInfos
 * @property Household $household
 */
class PersonalInfo extends CActiveRecord
{
    public function getGenders(){
		return array(0 => 'Female', 1 => 'Male');
	}

	public function getCivilStatus(){
		return array(0 => 'Single',	1 => 'Married', 2 => 'Widowed');
	}

	public function getIsHead(){
		return array(0 => 'No', 1 => 'Yes');
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
			array('first_name, middle_name, last_name, birthdate, address, household_id, birthplace, height, weight, citizenship, religion, contact_num, residence_year', 'required'),
			array('barangay_id, gender, is_head, household_id, civil_status, height, weight', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name', 'length', 'max'=>35),
			array('provincial_address, birthplace', 'length', 'max'=>200),
			array('spouse_name', 'length', 'max'=>120),
			array('citizenship, religion', 'length', 'max'=>100),
			array('contact_num', 'length', 'max'=>45),
			array('email_address', 'length', 'max'=>254),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, barangay_id, first_name, middle_name, last_name, birthdate, gender, address, is_head, household_id, provincial_address, birthplace, civil_status, spouse_name, height, weight, citizenship, religion, contact_num, email_address, residence_year', 'safe', 'on'=>'search'),
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
			'address' => 'Address',
			'is_head' => 'Is Head',
			'household_id' => 'Household',
			'provincial_address' => 'Provincial Address',
			'birthplace' => 'Birthplace',
			'civil_status' => 'Civil Status',
			'spouse_name' => 'Spouse Name',
			'height' => 'Height',
			'weight' => 'Weight',
			'citizenship' => 'Citizenship',
			'religion' => 'Religion',
			'contact_num' => 'Contact Num',
			'email_address' => 'Email Address',
			'residence_year' => 'Residence Year',
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
		$criteria->compare('barangay_id',$this->barangay_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('is_head',$this->is_head);
		$criteria->compare('household_id',$this->household_id);
		$criteria->compare('provincial_address',$this->provincial_address,true);
		$criteria->compare('birthplace',$this->birthplace,true);
		$criteria->compare('civil_status',$this->civil_status);
		$criteria->compare('spouse_name',$this->spouse_name,true);
		$criteria->compare('height',$this->height);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('citizenship',$this->citizenship,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('contact_num',$this->contact_num,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('residence_year',$this->residence_year,true);

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
}
