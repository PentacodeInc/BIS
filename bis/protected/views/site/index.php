<script>
    jssor_slider1_starter = function (containerId) {
        var options = {
            $DragOrientation: 3,                                
            $SlideDuration: 500,
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,            
                $ChanceToShow: 2,
                $AutoCenter: 2,
                $Steps: 1                                       
            }
        };
        var jssor_slider1 = new $JssorSlider$(containerId, options);
    };
</script>

<div id="slideshow">
<div id="slider1_container" style="position: relative; width: 1100px; height: 500px; overflow: hidden;margin:auto;">
        <div u="slides" style="position: relative; width:1100px; height: 500px; overflow: hidden; ">
            <div><img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/blue.jpg" /></div>
            <div><img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/red.jpg" /></div>
            <div><img u="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/purple.jpg" /></div>
        </div>
        <span u="arrowleft" class="jssora01l" style="width: 45px; height: 45px; top: 123px; left: 8px;"></span>
        <span u="arrowright" class="jssora01r" style="width: 45px; height: 45px; top: 123px; right: 8px"></span>
        <script>
            jssor_slider1_starter('slider1_container');
        </script>
    </div></div>

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