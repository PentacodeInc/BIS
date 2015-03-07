<?php

/**
 * This is the model class for table "educational_info".
 *
 * The followings are the available columns in table 'educational_info':
 * @property integer $id
 * @property integer $level
 * @property string $school
 * @property string $graduation_date
 * @property string $remarks
 * @property integer $personal_info_id
 *
 * The followings are the available model relations:
 * @property PersonalInfo $personalInfo
 */
class EducationalInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'educational_info';
	}

	public function getDetails($user_id,$level){
		$criteria=new CDbCriteria;
		$criteria->condition = 'personal_info_id=:user_id AND level=:level';
		$criteria->params = array(':user_id'=>$user_id,':level'=>$level);
		return EducationalInfo::model()->findAll($criteria);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('level, school, personal_info_id', 'required'),
			array('personal_info_id', 'numerical', 'integerOnly'=>true),
			array('graduation_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, level, school, graduation_date, remarks, personal_info_id', 'safe', 'on'=>'search'),
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
			'level' => 'Level',
			'school' => 'School',
			'graduation_date' => 'Date Graduated',
			'remarks' => 'Remarks',
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
		$criteria->compare('level',$this->level);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('graduation_date',$this->graduation_date,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('personal_info_id',$this->personal_info_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EducationalInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
