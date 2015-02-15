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

<div id="home">
    
    
    
    <div class="main">
        <h1>Announcements</h1>
    
    </div>
    
    <div class="sidebar">
        <h1>Events</h1>
        
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        
        <h1>Archives</h1>
        
        <br/>
        <br/>
        <br/>
        <br/>
                
    </div>
    
</div>