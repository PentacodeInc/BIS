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

<?php $rows=SliderImages::model()->findAll(array('condition'=>'is_active=1'));?>
<?php if(count($rows) != 0){?>
<div id="slideshow">
<div class="callbacks_container">
<ul class="rslides">
    <?php foreach($rows as $row){ ?>
        <li><img src="<?php echo $row->filename?>" alt=""></li>
    <?php }?>
</ul>
</div>  
</div>
<?php } ?>
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