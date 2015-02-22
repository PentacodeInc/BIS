<?php

class PersonalInfoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createHousehold'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('adminaa'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new PersonalInfo;
		$educationalInfo=new EducationalInfo;
		$employmentInfo=new EmploymentInfo;
		$familyInfo=new FamilyInfo;
		$governmentInfo=new GovernmentInfo;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation(array($model,$educationalInfo,$employmentInfo,$familyInfo,$governmentInfo));

		if(isset($_POST['PersonalInfo'],$_POST['EducationalInfo'],$_POST['EmploymentInfo'],$_POST['FamilyInfo'],$_POST['GovernmentInfo']))
		{
			$model->attributes=$_POST['PersonalInfo'];
			$educationalInfo->attributes=$_POST['EducationalInfo'];
			$employmentInfo->attributes=$_POST['EmploymentInfo'];
			$familyInfo->attributes=$_POST['FamilyInfo'];
			$governmentInfo->attributes=$_POST['GovernmentInfo'];
			$valid = $model->validate();
			$valid = $educationalInfo->validate() && $valid;
			$valid = $employmentInfo->validate() && $valid;
			$valid = $familyInfo->validate() && $valid;
			$valid = $governmentInfo->validate() && $valid;
			// echo $model->birthdate;
			if($valid){
				if($model->save(false)){
					$educationalInfo->personal_info_id = $model->id;
					$employmentInfo->personal_info_id = $model->id;
					for ($i=0; $i < 2; $i++) { 
						$familyInfo= new FamilyInfo;
						$familyInfo->member_name= $_POST['FamilyInfo']['member_name'][$i];
						$familyInfo->relationship= $_POST['FamilyInfo']['relationship'][$i];
						$familyInfo->personal_info_id=$model->id;
						$familyInfo->save(false);
					}
					$governmentInfo->personal_info_id = $model->id;				
					$educationalInfo->save(false);
					$employmentInfo->save(false);
					$governmentInfo->save(false);
					$this->redirect(array('admin'));		
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'educationalInfo'=>$educationalInfo,
			'employmentInfo'=>$employmentInfo,
			'familyInfo'=>$familyInfo,
			'governmentInfo'=>$governmentInfo
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PersonalInfo']))
		{
			$model->attributes=$_POST['PersonalInfo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PersonalInfo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PersonalInfo('search');
		$model->unsetAttributes();  // clear any default values
        
		if(isset($_GET['PersonalInfo']))
			$model->attributes=$_GET['PersonalInfo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PersonalInfo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PersonalInfo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PersonalInfo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='personal-info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionCreateHousehold(){
		$householdName = $_POST['householdName'];
		$houseHold= Household::model()->find('name=:name',array(':name'=>$householdName));
		$status = false;
		if(empty($houseHold)){
			$houseHold=new Household;
			$houseHold->name = $householdName;
			$houseHold->save();
			$status = true;
		}
	    header('Content-Type: application/json; charset="UTF-8"');
	    echo CJSON::encode(array('success'=>$status,'houseHold'=>$houseHold));
	}
}
