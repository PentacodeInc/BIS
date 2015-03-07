<?php

/**
 * This is the model class for table "government_info".
 *
 * The followings are the available columns in table 'government_info':
 * @property integer $id
 * @property integer $sss_num
 * @property integer $philhealth_num
 * @property integer $gsis_num
 * @property integer $tin_num
 * @property integer $voters_id
 * @property integer $senior_citizen_num
 * @property integer $orange_card_num
 * @property integer $personal_info_id
 *
 * The followings are the available model relations:
 * @property PersonalInfo $personalInfo
 */
class GovernmentInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'government_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sss_num, philhealth_num, gsis_num, tin_num, voters_id, senior_citizen_num, orange_card_num, personal_info_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sss_num, philhealth_num, gsis_num, tin_num, voters_id, senior_citizen_num, orange_card_num, personal_info_id', 'safe', 'on'=>'search'),
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
			'sss_num' => 'Sss No',
			'philhealth_num' => 'Philhealth No',
			'gsis_num' => 'Gsis No',
			'tin_num' => 'Tin No',
			'voters_id' => 'Voters',
			'senior_citizen_num' => 'Senior Citizen No',
			'orange_card_num' => 'Orange Card No',
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
		$criteria->compare('sss_num',$this->sss_num);
		$criteria->compare('philhealth_num',$this->philhealth_num);
		$criteria->compare('gsis_num',$this->gsis_num);
		$criteria->compare('tin_num',$this->tin_num);
		$criteria->compare('voters_id',$this->voters_id);
		$criteria->compare('senior_citizen_num',$this->senior_citizen_num);
		$criteria->compare('orange_card_num',$this->orange_card_num);
		$criteria->compare('personal_info_id',$this->personal_info_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GovernmentInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
