<?php

/**
 * This is the model class for table "family_info".
 *
 * The followings are the available columns in table 'family_info':
 * @property integer $id
 * @property string $member_name
 * @property integer $relationship
 * @property integer $personal_info_id
 *
 * The followings are the available model relations:
 * @property PersonalInfo $personalInfo
 */
class FamilyInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'family_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		/*	array('member_name, relationship', 'required'),
			array('id, relationship, personal_info_id', 'numerical', 'integerOnly'=>true),
			array('member_name', 'length', 'max'=>120),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, member_name, relationship, personal_info_id', 'safe', 'on'=>'search'),
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
			'personalInfo' => array(self::BELONGS_TO, 'PersonalInfo', 'personal_info_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'member_name' => 'Member Name',
			'relationship' => 'Relationship',
			'personal_info_id' => 'Personal Info',
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
		$criteria->compare('member_name',$this->member_name,true);
		$criteria->compare('relationship',$this->relationship);
		$criteria->compare('personal_info_id',$this->personal_info_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FamilyInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
