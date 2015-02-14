<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsiveslides.css">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,600,700,800' rel='stylesheet' type='text/css'>
    
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/responsiveslides.min.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About Us', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Officials', 'url'=>array('/site/page', 'view'=>'officials')),
                array('label'=>'Photo Gallery', 'url'=>'https://www.facebook.com/pages/Barangay730zone79/515313718511386?sk=photos_stream&tab=photos_albums'),
                array('label'=>'Downloadble Files', 'url'=>array('/site/page', 'view'=>'download')),
                array('label'=>'Dashboard', 'url'=>array('/personalInfo/dashboard'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Search', 'url'=>array('/personalInfo/admin'),'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Maintenance', 'url'=>array('/site/page', 'view'=>'links'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
    <?php echo $content; ?>
        
	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Pentacode.<br/>
		All Rights Reserved. <?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
