<?php
	$user_rights = $this->getAccessRule();
	$this->menu=array();
	if(in_array('Create',$user_rights)){
		array_push($this->menu, array('label' => 'Add Category', 'url'=>array('create'),'htmlOptions' => array('class'=>'btn-default btn-sm'),'icon' => 'plus'));
	}
	if(in_array('Update',$user_rights)){
		array_push($this->menu, array('label' => 'Update Category', 'url'=>array('update', 'id'=>$model->category_id),'htmlOptions' => array('class'=>'btn-default btn-sm'),'icon' => 'note'));
	}
	if(in_array('Admin',$user_rights)){
		array_push($this->menu, array('label' => 'List Category', 'url'=>array('admin'),'htmlOptions' => array('class'=>'btn-default btn-sm'),'icon' => 'list'));
	}
	if(in_array('Delete',$user_rights)){
		array_push($this->menu, array('label' => 'Delete Category', 'url' => '#','htmlOptions'=>array('class'=>'btn-default btn-sm','submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this category?'),'icon' => 'trash',));
	}
	
	if($model->active_status=="H")
	{
		$array = array_push($this->menu, array('label'=>'Active Shop', 'url'=>'#','icon' => 'check',  'htmlOptions'=>array('class'=>'btn-default btn-sm','submit'=>array('setstatus','id'=>$model->category_id,'active_status'=>"S"),'confirm'=>'Are you sure to activate this shop?')));
	}else{
		$array = array_push($this->menu, array('label'=>'Deactive Shop', 'url'=>'#','icon' => 'ban',  'htmlOptions'=>array('class'=>'btn-default btn-sm','submit'=>array('setstatus','id'=>$model->category_id,'active_status'=>"H"),'confirm'=>'Are you sure to deactivate this shop?')));
	}
?>

<div class="col-lg-12">
	<div class="panel panel-default gradient">
		<div class="panel-heading">
			<h4>View Category</h4>
		</div>
		<div class="panel-body noPad clearfix">
			<div class="margin-bottom-10 ">
				<?php 
					$this->widget(
						'bootstrap.widgets.TbButtonGroup',
						array(
							'buttons' => $this->menu,
						)
					);
				?>				
			</div>
			<?php $this->widget('bootstrap.widgets.TbDetailView', array(
				'data'=>$model,
				'type'=>'striped bordered condensed',
				'attributes'=>array(
								'category_id',
								'category',
								array(
									'name'=>'created_by',
									'value'=>($model->created_by == "") ? "Not set" : $model->createdBy->name,
								),
								array(
									'name'=>'active_status',
									'value'=>($model->active_status == "S") ? "Active" : "Deactive",
								),
								array(
									'name'=>'added_on',
									'value'=>($model->added_on == '') ? "Not Set" : Controller::dateConvert($model->added_on),
								),
								array(
									'name'=>'updated_on',
									'value'=>($model->updated_on == '') ? "Not Set" : Controller::dateConvert($model->updated_on),
								),
							),
			)); ?>
		</div>
	</div>
</div>
