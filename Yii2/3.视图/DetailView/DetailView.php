<?php

	<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
      'id',
      ['label'=>'name','value'=>$model->name)],
    ],
    'template' => '<tr><th class="w-10">{label}</th><td>{value}</td></tr>', 
    'options' => ['class' => 'table table-striped table-bordered detail-view'],
	]) ?>