<?php

/**
 * This is the model class for table "citizen".
 *
 * The followings are the available columns in table 'citizen':
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
 *
 * The followings are the available model relations:
 * @property Household $household
 */
class Citizen extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'citizen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('barangay_id, first_name, middle_name, last_name, birthdate, address, household_id', 'required'),
			array('barangay_id, gender, is_head, household_id', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name', 'length', 'max'=>35),
			array('birthdate', 'length', 'max'=>12),
			array('address', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, barangay_id, first_name, middle_name, last_name, birthdate, gender, address, is_head, household_id', 'safe', 'on'=>'search'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Citizen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
