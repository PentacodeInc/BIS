<?php

/**
 * This is the model class for table "slider_images".
 *
 * The followings are the available columns in table 'slider_images':
 * @property integer $id
 * @property string $filename
 * @property integer $is_active
 * @property string $posted_datetime
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class SliderImages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'slider_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('filename, posted_datetime, user_id', 'required'),
			array('is_active, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('is_active', 'safe', 'on'=>'search'),
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
			'filename' => 'Filename',
			'is_active' => 'Is Active',
			'posted_datetime' => 'Posted Datetime',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
        $criteria->with= array('user');

		//$criteria->compare('id',$this->id);
		//$criteria->compare('filename',$this->filename,true);
		$criteria->compare('t.is_active',$this->is_active);
		//$criteria->compare('posted_datetime',$this->posted_datetime,true);
		//$criteria->compare('user_id',$this->user_id);
        if ($this->posted_datetime){
            $fromdate =  new DateTime($this->posted_datetime);
            $search = $fromdate->format('Y-m-d');
            $criteria->compare('t.posted_datetime',$search,true);
        }
		$criteria->compare('user.username',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SliderImages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function beforeValidate()
    {           
        $this->posted_datetime=date('YmdHis');
        $this->user_id=Yii::app()->user->id;
        return parent::beforeValidate(); 
    }
}
