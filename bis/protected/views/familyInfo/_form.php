<?php 

	$labels = array('Monther\'s Name','Father\'s Name');
	for ($i=0; $i < 2; $i++) { 
		if(empty($model[$i]))
			$model[$i]=new FamilyInfo;
		echo "<div class='row'>";
		echo $form->labelEx($model[$i],$labels[$i]);
		echo $form->textField($model[$i],"member_name",array('size'=>55, 'name'=> 'FamilyInfo[member_name]['.$i.']'));
		echo "</div>";
		echo $form->hiddenField($model[$i],"relationship",array('value'=>$i, 'name'=> 'FamilyInfo[relationship]['.$i.']'));
		// if(!empty($model[$i]->id)){
			echo $form->hiddenField($model[$i],'id', array('value'=>$model[$i]->id,'name'=>'FamilyInfo[id]['.$i.']'));
		// }
		
	}

	echo "<div class='row' id='sibbling_div'>";
	echo $form->labelEx(FamilyInfo::model(),'Siblings');
	if(count($model) > 2){
		for ($i=2; $i < count($model); $i++) { 
            echo "<div class='perSibblings'>";
			echo $form->textField($model[$i],"member_name",array('size'=>55,'class'=>'txtsibbling' ,'name'=> 'FamilyInfo[member_name]['.$i.']'));
			echo $form->hiddenField($model[$i],"relationship",array('value'=>2, 'name'=> 'FamilyInfo[relationship]['.$i.']'));
			// if(!empty($model[$i]->id)){
	       		echo $form->hiddenField($model[$i],'id', array('value'=>$model[$i]->id,'name'=>'FamilyInfo[id]['.$i.']'));
	    	// }
			if($i===2){
				echo "<input type='button' id='btnAddSibbling' value='Add'/>";
			}else{
				echo "<input type='button' value='Remove' id='btnRemoveSibbling' data-counter='{$i}' />";
			}
            echo "</div>";	
            
		}
	}else{
        echo "<div class='perSibblings'>";
		echo $form->textField(FamilyInfo::model(),"member_name",array('size'=>55, 'name'=> 'FamilyInfo[member_name][2]', 'class'=>'txtsibbling'));
		echo $form->hiddenField(FamilyInfo::model(),"relationship",array('value'=>2, 'name'=> 'FamilyInfo[relationship][2]'));
		echo $form->hiddenField(FamilyInfo::model(),'id', array('name'=>'FamilyInfo[id][2]'));
		echo "<input type='button' id='btnAddSibbling' value='Add'/>";
        echo "</div>";	
	}
	echo "</div>";	
?>
