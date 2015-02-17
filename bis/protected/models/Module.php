<?php

/**
 * This is the model class for table "module".
 *
 * The followings are the available columns in table 'module':
 * @property integer $id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Access[] $accesses
 */
class Module extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $user_id;
	public function tableName()
	{
		return 'module';
	}

	public function getAll($id){
		$criteria=new CDbCriteria;
		$criteria->select = array("t.id","t.name", "A.user_id as user_id");
		$criteria->join = "LEFT OUTER JOIN ACCESS A ON A.module_id = t.id AND A.user_id =:userid";
		$criteria->order = 't.name';
		$criteria->params = array(':userid'=>$id);
		return Module::model()->findAll($criteria);
	}

	public function generateModuleColumns($id,$columns){
		$modules = Module::getAll($id);
		foreach ($modules as $key => $value) {
			$result = Yii::t('app','"Y"');
			if(empty($value->user_id)){
				$result = Yii::t('app','"N"');
			}
			array_push($columns,array(
					'header'=>$value->name,
					'value'=>$result
				));
		}
		return $columns;
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
			array('name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'accesses' => array(self::HAS_MANY, 'Access', 'module_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
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
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Module the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
