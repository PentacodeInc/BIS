<?php 
    $levels = array('Elementary','Secondary','Tertiary','Vocational');
    for ($i=0; $i < 4 ; $i++) { 
       if(empty($model[$i])) 
            $model[$i] = new EducationalInfo;
       echo "<div class='form education'>";
       echo "<div class='row mainlabel'>";
       echo $form->labelEx($model[$i],$levels[$i]);
       echo $form->hiddenField($model[$i],'level', array('value'=>$i,'name'=>'EducationalInfo[level]['.$i.']'));
       if(!empty($model[$i]->id)){
        echo $form->hiddenField($model[$i],'id', array('value'=>$model[$i]->id,'name'=>'EducationalInfo[id]['.$i.']'));
       }
       echo "</div><div class='clear'></div>";
       echo "<div class='row'>";
       echo $form->labelEx($model[$i],'school');
       echo $form->textField($model[$i],'school',array('size'=>60,'name'=>'EducationalInfo[school]['.$i.']'));
       echo "</div>";
       echo "<div class='row'>";
       echo $form->labelEx($model[$i],'graduation_date');
       echo $form->textField($model[$i],'graduation_date',array('name'=>'EducationalInfo[graduation_date]['.$i.']'));
       echo "</div>";
       echo "<div class='row'>";
       echo $form->labelEx($model[$i],'remarks');
       echo $form->textField($model[$i],'remarks',array('size'=>60,'name'=>'EducationalInfo[remarks]['.$i.']'));
       echo "</div></div>";

   }
?>
