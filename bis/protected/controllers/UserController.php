<?php

class UserController extends Controller
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
				'actions'=>array('changePassword', 'admin'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'resetPassword'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->username = $this->generateUsernameAndPassword($model->first_name,$model->middle_name,$model->last_name);
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
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
		$modules=Module::getAll($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$keyValues = $_POST['User']['modules'];
			if($model->save()){
				Access::deleteAccess($model->id);
				foreach ($keyValues as $key => $value) {
					if($value){
						$access=new Access;
						$access->module_id = $key;
						$access->user_id = $model->id;
						$access->save();
					}
				}
				$this->redirect(array('admin'));
			}
				
		}

		$this->render('update',array(
			'model'=>$model,
			'modules'=>$modules
		));
	}
    
    public function actionChangePassword($id)
    {      
        $model = User::model()->findByAttributes(array('id'=>$id));
        $model->setScenario('changePwd');
  
        if(isset($_POST['User'])){
            $model->attributes = $_POST['User'];
            $valid = $model->validate();
            if($valid){
                $model->password = $model->new_password;
                if($model->save())
                    $this->redirect(array('changePassword','msg'=>'successfully changed password'));
                else
                    $this->redirect(array('changePassword','msg'=>'password not changed'));
            }
        }
        $this->render('changePassword',array('model'=>$model)); 
    }

    public function actionResetPassword($id){
		$model = User::model()->findByAttributes(array('id'=>$id));
		$password = $this->generateUsernameAndPassword($model->first_name,$model->middle_name,$model->last_name);
    	$salt = openssl_random_pseudo_bytes(22);
        $salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
        $password_hash = crypt($password, $salt);
        $model->password = $password_hash;
    	if($model->save()){
    		  Yii::app()->user->setFlash('success','Your have been successfully reset password: <br/> <li><b>Username:</b> '.$model->username.' <li><b>Password:</b> '.$model->username);
    		  $this->redirect(array('admin','msg'=>'successfully changed password'));
    	}
    		 
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
        
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	private function generateUsernameAndPassword($fname,$mname,$lname){
		$fname = strtolower(preg_replace('/\s+/', '', $fname));
		$mname = strtolower(preg_replace('/\s+/', '', $mname));
		$lname = strtolower(preg_replace('/\s+/', '', $lname));
		return $lname.$fname[0].$mname[0];
	}
}
