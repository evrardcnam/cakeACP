<div class="legumes form">

	<?php echo $this->AlaxosForm->create('Legume');?>
	
 	<h2><?php ___('admin add legume'); ?></h2>
 	
 	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'list' => true));
	?>
 	
 	<table border="0" cellpadding="5" cellspacing="0" class="edit">
	<tr>
		<td>
			<?php ___('lib') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('lib', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('unite_id') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('unite_id', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('classification_id') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('classification_id', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('img') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('img', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('date_mod') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('date_mod', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php ___('rem') ?>
		</td>
		<td>:</td>
		<td>
			<?php echo $this->AlaxosForm->input('rem', array('label' => false)); ?>
		</td>
	</tr>
	<tr>
 		<td></td>
 		<td></td>
 		<td>
			<?php echo $this->AlaxosForm->end(___('submit', true)); ?> 		</td>
 	</tr>
	</table>

</div>
