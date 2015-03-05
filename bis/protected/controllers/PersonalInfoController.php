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

	 public function behaviors() {
		  return array(
			'exportableGrid' => array(
				'class' => 'application.components.ExportableGridBehavior',
		  ));
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
				'actions'=>array('create','update','createHousehold','import','export'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
            $model->photo_filename=CUploadedFile::getInstance($model,'photo_filename');
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
0  barangay_id
1  precinct_no
2  first_name
3  middle_name
4  last_name
5  birthdate
6  gender
7  house_num
8  provincial_address
9  birthplace
10 civil_status
11 spouse_name
12 height
13 weight
14 citizenship
15 religion
16 contact_num
17 email_address
18 residency_start
19 residency_end
20 residency_type
21 father name
22 mother name
23 sss_num
24 philhealth_num
25 gsis_num
26 tin_num
27 voters_id
28 senior_citizen_num
29 orange_card_num
30 position
31 employer
32 start_date
33 end_date
34 elementary_school
35 elementary_start_date
36 elementary_end_date
37 elementary_remarks
38 secondary_school
39 secondary_start_date
40 secondary_end_date
41 secondary_remarks
42 tertiary_school
43 tertiary_start_date
44 tertiary_end_date
45 tertiary_course
46 tertiary_remarks
47 vocational_school
48 vocational_start_date
49 vocational_end_date
50 vocation_course
51 vocational_remarks

*/



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
	        	$personalInfo=$this->createPersonalInfo($line,$_POST['ImportForm']['street']);
	        	$this->createGovernmentInfo($line,$personalInfo->id);
	        	$this->createFamilyInfo($line,$personalInfo->id);
	        	$this->createEmploymentInfo($line,$personalInfo->id);
	        	$this->createEducationalInfo($line,$personalInfo->id);
	        }
			fclose($fp);
			$this->redirect(array('admin'));
		}
		$this->render('import',array(
			'model'	=>$model
		));
	}

	private function createEducationalInfo($line,$personalInfoId){
		$elemSchool= $line[34];
		if(!empty($elemSchool)){
			$elementaryInfo=new EducationalInfo;
			$elementaryInfo->level=0;
			$elementaryInfo->school	= $elemSchool;
			$elementaryInfo->startd_date	= $line[35];
			$elementaryInfo->end_date	= $line[36];
			$elementaryInfo->remarks	= $line[37];
			$elementaryInfo->save(false);
		}
		
		$secondarySchool= $line[38];
		if(!empty($secondarySchool)){
			$secondaryInfo=new EducationalInfo;
			$secondaryInfo->level=1;
			$secondaryInfo->school	= $secondarySchool;
			$secondaryInfo->startd_date	= $line[39];
			$secondaryInfo->end_date	= $line[40];
			$secondaryInfo->remarks	= $line[41];
			$secondaryInfo->save(false);
		}
		$tertiarySchool=$line[42];
		if(!empty($tertiarySchool)){
			$tertiaryInfo=new EducationalInfo;
			$tertiaryInfo->level=2;
			$tertiaryInfo->school	= $tertiarySchool;
			$tertiaryInfo->startd_date	= $line[43];
			$tertiaryInfo->end_date	= $line[44];
			$tertiaryInfo->course = $line[45];
			$tertiaryInfo->remarks	= $line[46];
			$tertiaryInfo->save(false);
		}
		
		$vocationalSchool=$line[47];
		if(!empty($vocationalSchool)){
			$vocationalInfo=new EducationalInfo;
			$vocationalInfo->level=3;
			$vocationalInfo->school	= $vocationalSchool;
			$vocationalInfo->startd_date	= $line[48];
			$vocationalInfo->end_date	= $line[49];
			$vocationalInfo->course = $line[50];
			$vocationalInfo->remarks	= $line[51];
			$vocationalInfo->save(false);
		}
		
	}

	private function createEmploymentInfo($line,$personalInfoId){
		$employmentInfo= new EmploymentInfo;
		$employmentInfo->personal_info_id = $personalInfoId;
		$employmentInfo->position = $line[30];
		$employmentInfo->employer	  = $line[31];
		$employmentInfo->start_date	  = $line[32];
		$employmentInfo->end_date	 = $line[33];
		$employmentInfo->save(false);
	}

	private function createFamilyInfo($line,$personalInfoId){
		$fatherInfo=new FamilyInfo;
		$fatherInfo->relationship=1;
		$fatherInfo->member_name=$line[21];
		$fatherInfo->personal_info_id=$personalInfoId;
		$fatherInfo->save(false);

		$motherInfo=new FamilyInfo;
		$motherInfo->relationship=0;
		$motherInfo->member_name=$line[22];
		$motherInfo->personal_info_id=$personalInfoId;
		$motherInfo->save(false);
	}

	private function createGovernmentInfo($line,$personalInfoId){
		$model=new GovernmentInfo;
		$model->sss_num	  = $line[23];
		$model->philhealth_num	  = $line[24];
		$model->gsis_num	  = $line[25];
		$model->tin_num	  = $line[26];
		$model->voters_id	  = $line[27];
		$model->senior_citizen_num	  = $line[28];
		$model->orange_card_num		 = $line[29];
		$model->personal_info_id = $personalInfoId;
		$model->save(false);
		// return $model;
	}

	private function createPersonalInfo($line,$street){
		$model=new PersonalInfo;
		$model->barangay_id = $line[0];
		$model->precinct_no = $line[1];
		$model->first_name = $line[2];
		$model->middle_name	= $line[3];
		$model->last_name = $line[4];
		$model->birthdate = $line[5];
		$model->gender	  = $line[6];
		$model->house_num = $line[7];
		$model->street	  = $street;
		$model->provincial_address = $line[8];
		$model->birthplace	  = $line[9];
		$model->civil_status	  = $line[10];
		$model->spouse_name	  = $line[11];
		$model->height	  = $line[12];
		$model->weight	  = $line[13];
		$model->citizenship	  = $line[14];
		$model->religion	  = $line[15];
		$model->contact_num	  = $line[16];
		$model->email_address	  = $line[17];
		$model->residency_start	  = $line[18];
		$model->residency_end	  = $line[19];
		$model->residency_type	 = $line[20];
		$model->save(false);
		return $model;
	}

	public function actionExport($criteria){
		$data = array();
		foreach (PersonalInfo::model()->findAll($criteria) as $key => $value) {
			$governmentInfo=GovernmentInfo::model()->findByAttributes(array('personal_info_id'=>$value->id));
			$employmentInfo=EmploymentInfo::model()->findByAttributes(array('personal_info_id'=>$value->id));
			$elemSchool=EducationalInfo::getDetails($value->id,0);
			$secondarySchool=EducationalInfo::getDetails($value->id,1);
			$tertiarySchool=EducationalInfo::getDetails($value->id,2);
			$vocationalSchool=EducationalInfo::getDetails($value->id,3);
			array_push($data, array(
				'barangay_id'=>$value->barangay_id,
				'precinct_no'=>$value->precinct_no,
				'first_name'=>$value->first_name,
				'middle_name'=>$value->middle_name,
				'last_name'=>$value->last_name,
				'birthdate'=>$value->birthdate,
				'gender'=>PersonalInfo::getGenders($value->gender),
				'house_num'=>$value->house_num,
				'street'=>$value->street,
				'provincial_address'=>$value->provincial_address,
				'birthplace'=>$value->birthplace,
				'civil_status'=>PersonalInfo::getCivilStatus($value->civil_status),
				'spouse_name'=>$value->spouse_name,
				'height'=>$value->height,
				'weight'=>$value->weight,
				'citizenship'=>$value->citizenship,
				'religion'=>$value->religion,
				'contact_num'=>$value->contact_num,
				'email_address'=>$value->email_address,
				'residency_start'=>$value->residency_start,
				'residency_end'=>$value->residency_end,
				'residency_type	'=>PersonalInfo::getResidencyType($value->residency_type),
				'father name'=>FamilyInfo::getFatherName($value->id),
				'mother name'=>FamilyInfo::getMotherName($value->id),
				'sss_num'=>empty($governmentInfo) ? "" : $governmentInfo->sss_num,
				'philhealth_num'=>empty($governmentInfo) ? "" : $governmentInfo->philhealth_num,
				'gsis_num'=>empty($governmentInfo) ? "" : $governmentInfo->gsis_num,
				'tin_num'=>empty($governmentInfo) ? "" : $governmentInfo->tin_num,
				'voters_id'=>empty($governmentInfo) ? "" : $governmentInfo->voters_id,
				'senior_citizen_num'=>empty($governmentInfo) ? "" : $governmentInfo->senior_citizen_num,
				'orange_card_num'=>empty($governmentInfo) ? "" : $governmentInfo->orange_card_num,
				'position'=>empty($employmentInfo) ? "" : $employmentInfo->position,
				'employer'=>empty($employmentInfo) ? "" : $employmentInfo->employer,
				'start_date'=>empty($employmentInfo) ? "" : $employmentInfo->start_date,
				'end_date'=>empty($employmentInfo) ? "" : $employmentInfo->end_date,
				'elementary_school'=>empty($elemSchool) ? "" : $elemSchool->school,
				'elementary_start_date'=>empty($elemSchool) ? "" : $elemSchool->start_date,
				'elementary_end_date'=>empty($elemSchool) ? "" : $elemSchool->end_date,
				'elementary_remarks'=>empty($elemSchool) ? "" : $elemSchool->remarks,
				'secondary_school'=>empty($secondarySchool) ? "" : $secondarySchool->school,
				'secondary_start_date'=>empty($secondarySchool) ? "" : $secondarySchool->start_date,
				'secondary_end_date'=>empty($secondarySchool) ? "" : $secondarySchool->end_date,
				'secondary_remarks'=>empty($secondarySchool) ? "" : $secondarySchool->remarks,
				'tertiary_school'=>empty($tertiarySchool) ? "" : $tertiarySchool->school,
				'tertiary_start_date'=>empty($tertiarySchool) ? "" : $tertiarySchool->start_date,
				'tertiary_end_date'=>empty($tertiarySchool) ? "" : $tertiarySchool->end_date,
				'tertiary_course'=>empty($tertiarySchool) ? "" : $tertiarySchool->course,
				'tertiary_remarks'=>empty($tertiarySchool) ? "" : $tertiarySchool->remarks,
				'vocational_school'=>empty($vocationalSchool) ? "" : $vocationalSchool->school,
				'vocational_start_date'=>empty($vocationalSchool) ? "" : $vocationalSchool->start_date,
				'vocational_end_date'=>empty($vocationalSchool) ? "" : $vocationalSchool->end_date,
				'vocation_course'=>empty($vocationalSchool) ? "" : $vocationalSchool->course,
				'vocational_remarks'=>empty($vocationalSchool) ? "" : $vocationalSchool->remarks
			));
		}	 
		return $data;
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

		if ($this->isExportRequest()) {
			$criteria=new CDbCriteria;
			if(isset($_GET['PersonalInfo'])){
				$fullName=$_GET['PersonalInfo']['fullName'];
				$street=$_GET['PersonalInfo']['street'];
				$gender=$_GET['PersonalInfo']['gender'];
				$civil_status=$_GET['PersonalInfo']['civil_status'];
				$residency_type=$_GET['PersonalInfo']['residency_type'];
				$age=$_GET['PersonalInfo']['age'];
				$citizenship=$_GET['PersonalInfo']['citizenship'];
				$criteria->compare('first_name',$fullName,false, 'OR');
				$criteria->compare('middle_name',$fullName,false, 'OR');
				$criteria->compare('last_name',$fullName,false, 'OR');
				$criteria->compare('concat(first_name, " ", last_name)', $fullName,false, 'OR');
				$criteria->compare('concat(last_name, " ", first_name)', $fullName,false, 'OR');
				$criteria->compare('street',$street,true);
		        $criteria->compare('gender',$gender);
		        $criteria->compare('civil_status',$civil_status);
		        $criteria->compare('citizenship',$citizenship,true);
		        $criteria->compare('residency_type',$residency_type);

		        if ($age != ""){
		            if($age == 0){
		                $criteria->addCondition('birthdate <= now() - INTERVAL 0 YEAR and birthdate > now() - INTERVAL 5 YEAR');
		            }else if($age == 1){
		                $criteria->addCondition('birthdate <= now() - INTERVAL 5 YEAR and birthdate > now() - INTERVAL 18 YEAR');
		            }else if($age == 2){
		                $criteria->addCondition('birthdate <= now() - INTERVAL 18 YEAR and birthdate > now() - INTERVAL 60 YEAR');
		            }else if($age == 3){
		                $criteria->addCondition('birthdate <= now() - INTERVAL 60 YEAR');
		            }
		        }
			}
			if(isset($_GET['letter'])){
				$criteria->compare('last_name',$_GET['letter'].'%',true,'AND',false);
			}

            $this->exportCSV($this->actionExport($criteria), array('barangay_id', 'precinct_no', 'first_name', 'middle_name', 'last_name', 'birthdate', 'gender', 'house_num', 'street', 'provincial_address', 'birthplace', 'civil_status', 'spouse_name', 'height', 'weight', 'citizenship', 'religion', 'contact_num', 'email_address', 'residency_start', 'residency_end', 'residency_type','father name','mother name','sss_num', 'philhealth_num', 'gsis_num', 'tin_num', 'voters_id', 'senior_citizen_num', 'orange_card_num','position', 'employer', 'start_date', 'end_date','elementary_school','elementary_start_date','elementary_end_date','elementary_remarks','secondary_school','secondary_start_date','secondary_end_date','secondary_remarks','tertiary_school','tertiary_start_date','tertiary_end_date','tertiary_course','tertiary_remarks','vocational_school','vocational_start_date','vocational_end_date','vocation_course','vocational_remarks'));
        }
		
			

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
