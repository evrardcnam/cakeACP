<div class="articles form">

	<?php echo $this->AlaxosForm->create('Article');?>
	<?php echo $this->AlaxosForm->input('id'); ?>
	
 	<h2><?php ___('admin edit article'); ?></h2>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true, 'back_to_view_id' => $article['Article']['id']));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('lang') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('lang', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('title') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('title', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('introtext') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('introtext', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('fulltext') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('fulltext', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('state') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('state', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('update', true)); ?> 		</td>
 	</tr>
	</table>

</div>
