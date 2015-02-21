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
        <h1>Archives</h1>   
        <?php $this->renderPartial('//announcement/_list'); ?>
    </div>
    
     <div class="main">
        <h1>Announcements</h1>

        <?php $criteria=new CDbCriteria();
        $criteria->order='posted_datetime DESC';    
        if(isset($_GET["month"]) && isset($_GET["year"])){
            $criteria->condition = 'MONTH(posted_datetime) = :month AND YEAR(posted_datetime) = :year';
            $criteria->params = array(':month' => $_GET["month"], ':year'=>$_GET["year"]);
        }

        $dataProvider=new CActiveDataProvider('Announcement', array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>5,
            ),
        ));
        
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'//announcement/_view',
        )); ?>
    </div>
    
</div>