<?php

/**
 * This is the model class for table "access".
 *
 * The followings are the available columns in table 'access':
 * @property integer $id
 * @property integer $module_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Module $module
 * @property User $user
 */
class Access extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'access';
	}

	public function getAllUserHasAccess($module){
		$criteria=new CDbCriteria;
		$criteria->together = true; 
		$criteria->with =array('module','user');
		$criteria->condition = 'module.name IN (:name)';
		$criteria->params =array(':name'=>$module);
		$user = array();
		foreach (Access::model()->findAll($criteria) as $key => $value) {
			array_push($user, $value->user->username);
		}
		return $user;
	}

	public function hasAccess($module){
		$criteria=new CDbCriteria;
		$criteria->select = 't.user_id';
		$criteria->with = 'module';
		$criteria->condition = 't.user_id=:user_id';
        $criteria->params = array(':user_id'=>Yii::app()->user->id);
        if ($module != ""){
          $criteria->addCondition('module.name=:name');
		  $criteria->params = array(':user_id'=>Yii::app()->user->id,':name'=>$module);
        }
        return !empty(Access::model()->find($criteria));
	}

	public function deleteAccess($user_id){
		$command = Yii::app()->db->createCommand();
		$command->delete('access', 'user_id=:id', array(':id'=>$user_id));
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('module_id, user_id', 'required'),
			array('module_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, module_id, user_id', 'safe', 'on'=>'search'),
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
			'module' => array(self::BELONGS_TO, 'Module', 'module_id'),
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
			'module_id' => 'Module',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('module_id',$this->module_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Access the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
