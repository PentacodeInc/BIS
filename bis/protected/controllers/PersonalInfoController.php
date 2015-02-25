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
				'actions'=>array('create','update','createHousehold','import'),
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
            $model->filename=CUploadedFile::getInstance($model,'photo_filename');
			$valid = $model->validate();
			$valid = $educationalInfo->validate() && $valid;
			$valid = $employmentInfo->validate() && $valid;
			$valid = $familyInfo->validate() && $valid;
			$valid = $governmentInfo->validate() && $valid;
			// echo $model->birthdate;
			if($valid){
				if($model->save(false)){
                    $model->photo_filename->saveAs(Yii::getPathOfAlias('webroot').'/images/userimage/'.$model->photo_filename);
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

/*	
	0 barangay_id	 
	1  precinct_no	 
	2  first_name
	3  middle_name	 
	4  last_name	 
	5  birthdate	 
	6  gender	 
	7  house_num	 
	8  street	 
	9  provincial_address	 
	10 birthplace	 
	11 civil_status	 
	12 spouse_name	 
	13 height	 
	14 weight	 
	15 citizenship	 
	16 religion	 
	17 contact_num	 
	18 email_address	 
	19 residency_start	 
	20 residency_end	 
	21 residency_type	

	22 father name
	23 mother name

	24 sss_num	 
	25 philhealth_num	 
	26 gsis_num	 
	27 tin_num	 
	28 voters_id	 
	29 senior_citizen_num	 
	30 orange_card_num		

	31 position	 
	32 employer	 
	33 start_date	 
	34 end_date	

	35 elementary_school	
	36 elementary_startd_date	
	37 elementary_end_date	
	38 elementary_remarks	

	39 secondary_school	
	40 secondary_start_date	
	41 secondary_end_date	
	42 secondary_remarks	
 
	43 tertiary_school	
	44 tertiary_start_date	
	45 tertiary_end_date	
	46 tertiary_course	
	47 tertiary_remarks	

	48 vocational_school	
	49 vocational_start_date	
	50 vocational_end_date	
	51 vocation_course	
	52 vocational_remarks*/


	public function actionImport(){
		$model= new ImportForm;
		if(isset($_POST['ImportForm'])){
			$file = CUploadedFile::getInstance($model,'csv_file');
			$fp = fopen($file->tempName, 'r');
			$first_time = true;
	        while (($line = fgetcsv($fp)) != FALSE) {
	        	if ($first_time == true) {
	                $first_time = false;
	                continue;
	            }
	        	$personalInfo=$this->createPersonalInfo($line,$_POST['ImportForm']['household']);
	        	$this->createGovernmentInfo($line,$personalInfo->id);
	        	$this->createFamilyInfo($line,$personalInfo->id);
	        	$this->createEmploymentInfo($line,$personalInfo->id);
	        	$this->createEducationalInfo($line,$personalInfo->id);
	        	$this->redirect(array('admin'));
	        }
			fclose($fp);
		}
		$this->render('import',array(
			'model'	=>$model
		));
	}

	private function createEducationalInfo($line,$personalInfoId){
		$elemSchool= $line[35];
		if(!empty($elemSchool)){
			$elementaryInfo=new EducationalInfo;
			$elementaryInfo->level=0;
			$elementaryInfo->school	= $elemSchool;
			$elementaryInfo->startd_date	= $line[36];
			$elementaryInfo->end_date	= $line[37];
			$elementaryInfo->remarks	= $line[38];
			$elementaryInfo->save(false);
		}
		
		$secondarySchool= $line[39];
		if(!empty($secondarySchool)){
			$secondaryInfo=new EducationalInfo;
			$secondaryInfo->level=1;
			$secondaryInfo->school	= $secondarySchool;
			$secondaryInfo->startd_date	= $line[40];
			$secondaryInfo->end_date	= $line[41];
			$secondaryInfo->remarks	= $line[42];
			$secondaryInfo->save(false);
		}
		$tertiarySchool=$line[43];
		if(!empty($tertiarySchool)){
			$tertiaryInfo=new EducationalInfo;
			$tertiaryInfo->level=2;
			$tertiaryInfo->school	= $tertiarySchool;
			$tertiaryInfo->startd_date	= $line[44];
			$tertiaryInfo->end_date	= $line[45];
			$tertiaryInfo->course = $line[46];
			$tertiaryInfo->remarks	= $line[47];
			$tertiaryInfo->save(false);
		}
		
		$vocationalSchool=$line[48];
		if(!empty($vocationalSchool)){
			$vocationalInfo=new EducationalInfo;
			$vocationalInfo->level=3;
			$vocationalInfo->school	= $vocationalSchool;
			$vocationalInfo->startd_date	= $line[44];
			$vocationalInfo->end_date	= $line[45];
			$vocationalInfo->course = $line[46];
			$vocationalInfo->remarks	= $line[47];
			$vocationalInfo->save(false);
		}
		
	}

	private function createEmploymentInfo($line,$personalInfoId){
		$employmentInfo= new EmploymentInfo;
		$employmentInfo->personal_info_id = $personalInfoId;
		$employmentInfo->position = $line[31];
		$employmentInfo->employer	  = $line[32];
		$employmentInfo->start_date	  = $line[33];
		$employmentInfo->end_date	 = $line[34];
		$employmentInfo->save(false);
	}

	private function createFamilyInfo($line,$personalInfoId){
		$fatherInfo=new FamilyInfo;
		$fatherInfo->relationship=1;
		$fatherInfo->member_name=$line[22];
		$fatherInfo->personal_info_id=$personalInfoId;
		$fatherInfo->save(false);

		$motherInfo=new FamilyInfo;
		$motherInfo->relationship=0;
		$motherInfo->member_name=$line[23];
		$motherInfo->personal_info_id=$personalInfoId;
		$motherInfo->save(false);
	}

	private function createGovernmentInfo($line,$personalInfoId){
		$model=new GovernmentInfo;
		$model->sss_num	  = $line[24];
		$model->philhealth_num	  = $line[25];
		$model->gsis_num	  = $line[26];
		$model->tin_num	  = $line[27];
		$model->voters_id	  = $line[28];
		$model->senior_citizen_num	  = $line[29];
		$model->orange_card_num		 = $line[30];
		$model->personal_info_id = $personalInfoId;
		$model->save(false);
		// return $model;
	}

	private function createPersonalInfo($line,$household){
		$model=new PersonalInfo;
		$model->barangay_id = $line[0];
		$model->precinct_no = $line[1];
		$model->first_name = $line[2];
		$model->middle_name	= $line[3];
		$model->last_name = $line[4];
		$model->birthdate = $line[5];
		$model->gender	  = $line[6];
		$model->house_num = $line[7];
		$model->street	  = $line[8];
		$model->provincial_address	  = $line[9];
		$model->birthplace	  = $line[10];
		$model->civil_status	  = $line[11];
		$model->spouse_name	  = $line[12];
		$model->height	  = $line[13];
		$model->weight	  = $line[14];
		$model->citizenship	  = $line[15];
		$model->religion	  = $line[16];
		$model->contact_num	  = $line[17];
		$model->email_address	  = $line[18];
		$model->residency_start	  = $line[19];
		$model->residency_end	  = $line[20];
		$model->residency_type	 = $line[21];
		$model->household_id= $household;
		$model->save(false);
		return $model;
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
