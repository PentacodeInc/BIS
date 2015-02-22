<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/responsiveslides.min.js"></script>
<script>
$(function () {
      $(".rslides").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 1000,
        namespace: "callbacks",
      });

    });
</script>

<div id="slideshow">
<div class="callbacks_container">
<ul class="rslides">
    <?php $rows=SliderImages::model()->findAll(array('condition'=>'is_active=1'));
    foreach($rows as $row){ ?>
        <li><img src="<?php echo $row->filename?>" alt=""></li>
    <?php }?>
</ul>
</div>  
</div>

<div class="home">
    
    <div class="sidebar"> 
        <h2><i class="fa fa-calendar-o"></i> Calendar</h2>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
            array(
                'name'=>'inline_datepicker',
                'flat' => true,
                'language'=>'en-GB',
            )
        );?>
        <br/><br/>
        <h2><i class="fa fa-history"></i> Archives</h2>   
        <?php $this->renderPartial('//announcement/_list'); ?>
        <br/><br/>
        <?php if(!Yii::app()->user->isGuest){?>
        <h2><i class="fa fa-chevron-circle-down"></i> Menu</h2>
        <div id="links">
            <?php echo CHtml::link('<i class="fa fa-area-chart"></i> Dashboard</a>', array('/personalInfo/dashboard')); ?>
            <?php echo CHtml::link('<i class="fa fa-database"></i> Residents Database</a>', array('/personalInfo/admin')); ?>
            <?php echo CHtml::link('<i class="fa fa-users"></i> User Maintenance</a>', array('/user/admin')); ?>
            <?php echo CHtml::link('<i class="fa fa-picture-o"></i> Slide Show Maintenance</a>', array('/sliderImages/admin')); ?>
            <?php echo CHtml::link('<i class="fa fa-bullhorn"></i> Announcements Maintenance', array('/announcement/admin')); ?>
            <?php echo CHtml::link('<i class="fa fa-download"></i> Downloadable Files Maintenance</a>', array('/downloadableFiles/admin')); ?>
            <?php echo CHtml::link('<i class="fa fa-road"></i> Streets Maintenance</a>', array('/street/admin')); ?>
        </div>
        <?php } ?>
    </div>
    
    <div class="main">
        <!--<h1>Announcements</h1>-->

        <?php $criteria=new CDbCriteria();
        $criteria->order='posted_datetime DESC';    
        if(isset($_GET["month"]) && isset($_GET["year"])){
            $criteria->condition = 'MONTH(posted_datetime) = :month AND YEAR(posted_datetime) = :year';
            $criteria->params = array(':month' => $_GET["month"], ':year'=>$_GET["year"]);
        }
        $dataProvider=new CActiveDataProvider('Announcement', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>3,
            ),
        ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'//announcement/_view',
            'template'=>'{items} {pager}'
        ));?>
    </div>
    
</div>