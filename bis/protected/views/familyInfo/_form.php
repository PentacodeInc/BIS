	<?php 
		$labels = array('Monther\'s Name','Father\'s Name');
		for ($i=0; $i < 2; $i++) { 
			if(empty($model[$i]))
				$model[$i]=new FamilyInfo;
			echo "<div class='row'>";
			echo $form->labelEx($model[$i],$labels[$i]);
			echo $form->textField($model[$i],"member_name",array('size'=>60, 'name'=> 'FamilyInfo[member_name]['.$i.']'));
			echo "</div>";
			echo $form->hiddenField($model[$i],"relationship",array('value'=>$i, 'name'=> 'FamilyInfo[relationship]['.$i.']'));
			if(!empty($model[$i]->id)){
		       echo $form->hiddenField($model[$i],'id', array('value'=>$model[$i]->id,'name'=>'FamilyInfo[id]['.$i.']'));
		    }

		}
	?>
