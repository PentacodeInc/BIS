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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="mainmenu">
        <div id="logo" class="">
            <div class="logo">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png">
            </div>
            <div class="name">
                <b>Barangay 730, Zone 79</b><br/>
                996 Pablo Ocampo Sr. Street Malate Manila
            </div>
        </div>
        <div class="menu ">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About Us', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Officials', 'url'=>array('/site/page', 'view'=>'officials')),
                array('label'=>'Photo Gallery', 'url'=>array('/site/page', 'view'=>'pictures')),
                /*array('label'=>'Downloadble Files', 'url'=>array('/downloadableFiles')),
                array('label'=>'Dashboard', 'url'=>array('/personalInfo/dashboard'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Residents Database', 'url'=>array('/personalInfo/admin'),'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Maintenance', 'url'=>array('/site/page', 'view'=>'links'),'visible'=>!Yii::app()->user->isGuest),*/
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
        </div>
        <div class="clear"></div>
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
