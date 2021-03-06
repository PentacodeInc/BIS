<?php

/**
 * This is the model class for table "downloadable_files".
 *
 * The followings are the available columns in table 'downloadable_files':
 * @property integer $id
 * @property string $name
 * @property string $filename
 * @property integer $is_active
 * @property string $last_update_datetime
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class DownloadableFiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'downloadable_files';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('filename', 'file', 'types'=>'txt,doc,docx,xls,xlsx,pdf,ppt,pptx,jpg,png,gif'),
			array('is_active, user_id', 'numerical', 'integerOnly'=>true),
			// array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, filename, is_active, last_update_datetime, user_id', 'safe', 'on'=>'search'),
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
			'name' => 'Description',
			'filename' => 'File',
			'is_active' => 'Is Active',
			'last_update_datetime' => 'Update Date',
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
		$criteria->compare('t.name',$this->name,true);
		//$criteria->compare('filename',$this->filename,true);
		$criteria->compare('t.is_active',$this->is_active);
		//$criteria->compare('last_update_datetime',$this->last_update_datetime,true);
		//$criteria->compare('user_id',$this->user_id);
        if ($this->last_update_datetime){
            $fromdate =  new DateTime($this->last_update_datetime);
            $search = $fromdate->format('Y-m-d');
            $criteria->compare('t.last_update_datetime',$search,true);
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
	 * @return DownloadableFiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function beforeValidate()
    {           
        $this->last_update_datetime=date('YmdHis');
        $this->user_id=Yii::app()->user->id;
        return parent::beforeValidate(); 
    }
}
