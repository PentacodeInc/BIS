<script>
$(function () {
      $(".rslides").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
      });

    });
</script>

<div id="slideshow">
<div class="callbacks_container">
<ul class="rslides">
  <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue.jpg" alt=""></li>
  <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/red.jpg" alt=""></li>
  <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/purple.jpg" alt=""></li>
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