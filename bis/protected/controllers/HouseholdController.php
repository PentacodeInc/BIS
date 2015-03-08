<?php

class HouseholdController extends Controller
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
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
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
	public function actionCreate($id)
	{
        //where id is id ng ctzen to be head
		$model=new Household;
		$head=PersonalInfo::model()->findByPk($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Household']))
		{
			$model->attributes=$_POST['Household'];
			if($model->save()){
				foreach ($_POST['Household']['in'] as $key => $value) {
					$lower=PersonalInfo::model()->findByPk($value);
					$lower->household_id=$model->id;
					$lower->save(false);
				}
				foreach ($_POST['Household']['out'] as $key => $value) {
					$lower=PersonalInfo::model()->findByPk($value);
					$lower->household_id=NULL;
					$lower->save(false);
				}
				$head=PersonalInfo::model()->findByPk($_POST['PersonalInfo']['id']);
				$head->is_head=1;
				$head->household_id=$model->id;
				$head->save(false);
				$this->redirect(array('personalInfo/admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
            'head'=>$head,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        //where id id the household id
		$model=$this->loadModel($id);

		$head=PersonalInfo::model()->findByAttributes(array('household_id'=>$id,'is_head'=>1));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Household']))
		{
			$model->attributes=$_POST['Household'];
			if($model->save()){
				if(!empty($_POST['Household']['in'])){
					foreach ($_POST['Household']['in'] as $key => $value) {
						$lower=PersonalInfo::model()->findByPk($value);
						$lower->household_id=$model->id;
						$lower->save(false);
					}
				}
				if(!empty($_POST['Household']['out'])){
					foreach ($_POST['Household']['out'] as $key => $value) {
						$lower=PersonalInfo::model()->findByPk($value);
						$lower->household_id=NULL;
						$lower->save(false);
					}
				}
				$this->redirect(array('personalInfo/admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
            'head'=>$head,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		foreach (PersonalInfo::model()->findAll('household_id=:id',array(':id'=>$id)) as $key => $value) {
			$value->household_id=NULL;
			$value->is_head=0;
			$value->save(false);
		}
		$this->loadModel($id)->delete();
		$this->redirect(array('personalInfo/admin'));
		/*// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Household');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Household('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Household']))
			$model->attributes=$_GET['Household'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Household the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Household::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Household $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='household-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
