<?php
/* @var $this PersonalInfoController */
/* @var $dataProvider CActiveDataProvider */
/*  'dataProvider'=>$dataProvider,
    'street'=>$str,
    'precinct'=> $prct,
    'gender'=> $sex,
    'cStatus'=> $stat,
    'resType'=>$type,
    'age'=>$age*/

$this->breadcrumbs=array(
	'Personal Infos',
);

$this->menu=array(
	array('label'=>'Add Resident', 'url'=>array('create')),
    array('label'=>'Batch Add Residents', 'url'=>array('import')),
	//array('label'=>'Residents Database', 'url'=>array('admin')),
);
?>

<h1>Dashboard</h1>

<?php 
$streetSeries = array();
foreach ($street as $key => $value) {
  array_push($streetSeries, 
    array(
      'type'=>'column',
      'name'=> $key,
      'data'=>array(intval($value)),
    )
  );
}
$this->widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'modules/exporting',
        'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => 'Precinct Number'
        ),
        'xAxis' => array(
            'categories'=> array('Population')
        ),
        'series' => $streetSeries
    )
));
// print_r($precinct);
$precinctSeries=array();
foreach ($precinct as $key => $value) {
  array_push($precinctSeries, 
      array(
        'type'=>'column',
        'name'=>$key,
        'data'=>array(intval($value))
      )
  );
}


$this->widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'modules/exporting',
        'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => 'Precinct Number'
        ),
        'xAxis' => array(
            'categories'=> array('Population')
        ),
        'series' => $precinctSeries
    )
));

$genderSeries=array();
foreach ($gender as $key => $value) {
  array_push($genderSeries, 
    array(
      'name'=>$key,
      'y' => intval($value),
      'color' => 'js:Highcharts.getOptions().colors['.$value.']'
    )
  );
}

$civilStatusSeries=array();
foreach ($cStatus as $key => $value) {
  array_push($civilStatusSeries, 
    array(
      'name'=>$key,
      'y' => intval($value),
      'color' => 'js:Highcharts.getOptions().colors['.$value.']'
    )
  );
}


$this->widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'modules/exporting',
        'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => '',
        ),

        'series' => array(
            array(
                'type' => 'pie',
                'name' => 'Gender',
                'data' => $genderSeries,
                'center' => array(200, 150),
                'size' => 300,
                'showInLegend' => false,
                'dataLabels' => array(
                    'enabled' => true,
                ),
            ),
            array(
                'type' => 'pie',
                'name' => 'Civil Status',
                'data' => $civilStatusSeries,
                'center' => array(600, 150),
                'size' => 300,
                'showInLegend' => false,
                'dataLabels' => array(
                    'enabled' => true,
                ),
            ),
        ),
    )
));
$resTypeSeries=array();
foreach ($resType as $key => $value) {
   array_push($resTypeSeries, 
    array(
      'name'=>$key,
      'y' => intval($value),
      'color' => 'js:Highcharts.getOptions().colors['.$value.']'
    )
  );
}

$ageSeries=array();
foreach ($age as $key => $value) {
   array_push($ageSeries, 
    array(
      'name'=>$key,
      'y' => intval($value),
      'color' => 'js:Highcharts.getOptions().colors['.$value.']'
    )
  );
}
$this->widget('ext.highcharts.HighchartsWidget', array(
    'scripts' => array(
        'modules/exporting',
        'themes/grid-light',
    ),
    'options' => array(
        'title' => array(
            'text' => '',
        ),

        'series' => array(
            array(
                'type' => 'pie',
                'name' => 'Gender',
                'data' => $resTypeSeries,
                'center' => array(200, 150),
                'size' => 300,
                'showInLegend' => false,
                'dataLabels' => array(
                    'enabled' => true,
                ),
            ),
            array(
                'type' => 'pie',
                'name' => 'Civil Status',
                'data' => $ageSeries,
                'center' => array(600, 150),
                'size' => 300,
                'showInLegend' => false,
                'dataLabels' => array(
                    'enabled' => true,
                ),
            ),
        ),
    )
));
?>