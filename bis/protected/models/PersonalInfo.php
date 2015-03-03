<?php

/**
 * This is the model class for table "personal_info".
 *
 * The followings are the available columns in table 'personal_info':
 * @property integer $id
 * @property integer $barangay_id
 * @property string $precinct_no
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
    public $age;

    public function getPrecintNo(){
		return array(
		    '2830A' => Yii::t('fim','2830A'), 
		    '2830B' => Yii::t('fim','2830B'), 
		    '2830C' => Yii::t('fim','2830C'), 
		    '2831A' => Yii::t('fim','2831A'),
		    '2831B' => Yii::t('fim','2831B'),
		    '2832A' => Yii::t('fim','2832A'),
		    '2832B' => Yii::t('fim','2832B'),
		);
    }
 
	public function getGenders($i = ""){
		$item=array(0 => 'Female', 1 => 'Male');
		if(empty($i))
			return $item;
		return $item[$i];
	}

	public function getCivilStatus($i = ""){
		$item=array(0 => 'Single',	1 => 'Married', 2 => 'Divorced', 3 => 'Separated' ,4 => 'Widowed');
		if(empty($i))
			return $item;
		return $item[$i];
	}

	public function getIsHead($i = ""){
		$item=array(0 => 'No', 1 => 'Yes');
		if(empty($i))
			return $item;
		return $item[$i];
	}

	public function getResidencyType($i = ""){
		$item=array(0 => 'Renter', 1 => 'Owner');
		if(empty($i))
			return $item;
		return $item[$i];
	}

	public function getResidencyStatus(){
        $date = $this->residency_end;
		return (empty($date) || $date="0000-00-00") ? 'Active' : 'Inactive';
	}
    
    public function getAge(){
        return $age = date_diff(date_create($this->birthdate), date_create('now'))->y;
    }
    
    public function getAgeList(){
        return array(0 => 'Children  ',	1 => 'Minor', 2 => 'Adult', 3 => 'Senior Citizen');
    }
    
    public function getCitizenship(){
        return array('Filipino' => 'Filipino ','Dual' => 'Dual', 'Foreigner' => 'Foreigner');
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
			array('precinct_no', 'length', 'max'=>5),
			array('first_name, middle_name, last_name', 'length', 'max'=>35),
			array('house_num', 'length', 'max'=>25),
			array('street, citizenship, religion', 'length', 'max'=>100),
			array('spouse_name', 'length', 'max'=>120),
			array('contact_num', 'length', 'max'=>45),
			array('email_address', 'length', 'max'=>254),
			array('photo_filename', 'length', 'max'=>200),
			array('residency_type', 'length', 'max'=>10),
			array('provincial_address, residency_end', 'safe'),
            array('photo_filename', 'file', 'types'=>'jpg,png,gif'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, barangay_id, first_name, middle_name, last_name, birthdate, gender, house_num, street, provincial_address, is_head, household_id, birthplace, civil_status, spouse_name, height, weight, citizenship, religion, contact_num, email_address, photo_filename, residency_start, residency_end, residency_type, last_update_datetime, user_id, fullName, age', 'safe', 'on'=>'search'),
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
			'barangay_id' => 'ID Number',
			'precinct_no' => 'Precinct No',
            'fullName'=> 'Full Name',
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
            'age'=> 'Age',
            'ResidencyStatus'=>'Residency Status'
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
	public function search($letter)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->with= array('educationalInfos');
        $criteria->with= array('employmentInfos');
        $criteria->with= array('familyInfos');
        $criteria->with= array('governmentInfos');
        $criteria->with= array('household');
        
		$criteria->compare('first_name',$this->fullName,false, 'OR');
		$criteria->compare('middle_name',$this->fullName,false, 'OR');
		$criteria->compare('last_name',$this->fullName,false, 'OR');
		$criteria->compare('concat(first_name, " ", last_name)', $this->fullName,false, 'OR');
		$criteria->compare('concat(last_name, " ", first_name)', $this->fullName,false, 'OR');
        
		$criteria->compare('street',$this->street,true);
        $criteria->compare('gender',$this->gender);
        $criteria->compare('civil_status',$this->civil_status);
        $criteria->compare('citizenship',$this->citizenship,true);
        $criteria->compare('residency_type',$this->residency_type);
        //$criteria->compare('precinct_no',$this->precinct_no)
        
        if ($this->age != ""){
            if($this->age == 0){
                $criteria->addCondition('birthdate <= now() - INTERVAL 0 YEAR and birthdate > now() - INTERVAL 5 YEAR');
            }else if($this->age == 1){
                $criteria->addCondition('birthdate <= now() - INTERVAL 5 YEAR and birthdate > now() - INTERVAL 18 YEAR');
            }else if($this->age == 2){
                $criteria->addCondition('birthdate <= now() - INTERVAL 18 YEAR and birthdate > now() - INTERVAL 60 YEAR');
            }else if($this->age == 3){
                $criteria->addCondition('birthdate <= now() - INTERVAL 60 YEAR');
            }
        }
        
		if($letter != "")
            $criteria->compare('last_name',$letter.'%',true,'AND',false);
		
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
        	// $this->birthdate = date('Y-m-d', strtotime($this->birthdate));
        	$this->last_update_datetime=$timestamp->format('Y-m-d H:i:s');
        	// $this->is_head = empty(Yii::app()->db->getLastInsertID()) ? 1 : 0; 
        }
        return parent::beforeSave();
    }

    
}
