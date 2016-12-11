<div class="tblCustomers index">

	<h2><?php __('Adresses Cocagnard/e/s (commandes)');?></h2>
		<li><?php echo $this->Html->link(__('Nouvelle adresse Cocagnard/e', true), array('action' => 'add')); ?></li>

<!-- begin search form -->
 <table>
	 <tr>
		 <td>
 <div class="input">
<?php echo $form->create('TblCustomer', array('url' => array('action' => 'index'))); ?>
		<?php #echo $form->input('q', array('style' => 'width: 250px;', 'label' => false, 'size' => '80')); ?>
		<?php echo $form->input('q', array('label' => false, 'size' => '50', 'class'=>'txttosearch')); ?>
		</div>
</td><td>
<input type="submit" class="chercher" value="Chercher" /> 
</div> 
</td>
</tr>
</table>
<!-- end search form -->
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id','PersNo');?></th>
			<th><?php echo $this->Paginator->sort('PDD','PersPDDDistrNo');?></th>
			<th><?php echo $this->Paginator->sort('Nom','PersNom');?></th>
			<th><?php echo $this->Paginator->sort('Prénom','PersPrenom');?></th>
			<th><?php echo $this->Paginator->sort('Tél.','PersTelephone');?></th>
			<th><?php echo $this->Paginator->sort('Adresse','PersAdresse');?></th>
			<th><?php echo $this->Paginator->sort('CP','PersNPA');?></th>
			<th><?php echo $this->Paginator->sort('Commune','PersLocalite');?></th>
			<th><?php echo $this->Paginator->sort('Email','PersAdresseEmail');?></th>
			<th><?php echo $this->Paginator->sort('idCMS','jos_user_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tblCustomers as $tblCustomer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $tblCustomer['TblCustomer']['PersNo']; ?>&nbsp;</td>
		<td><?php pddshow($tblCustomer['TblCustomer']['PersPDDDistrNo']); ?>&nbsp;</td>
		
		<td><?php echo $tblCustomer['TblCustomer']['PersNom']; ?>&nbsp;</td>
		<td><?php echo $tblCustomer['TblCustomer']['PersPrenom']; ?>&nbsp;</td>
		<td><?php echo $tblCustomer['TblCustomer']['PersTelephone']; ?>&nbsp;</td>
		<td><?php echo $tblCustomer['TblCustomer']['PersAdresse']; ?>&nbsp;</td>
		<td><?php echo $tblCustomer['TblCustomer']['PersNPA']; ?>&nbsp;</td>
		<td><?php echo $tblCustomer['TblCustomer']['PersLocalite']; ?>&nbsp;</td>
		<td><?php echo "<a href=\"mailto:" .$tblCustomer['TblCustomer']['PersAdresseEmail'] ."\" target=\"_blank\">" .$tblCustomer['TblCustomer']['PersAdresseEmail'] ."</a>"; ?>&nbsp;</td>
		<td><?php echo "<a href=\"../../cms/administrator/index.php?option=com_users&view=user&task=edit&cid[]=" .$tblCustomer['TblCustomer']['jos_user_id']."\" title=\"pour modifier, loggez-vous comme administrateur dans joomla\">" .$tblCustomer['TblCustomer']['jos_user_id'] ."</a>"; ?>&nbsp;</td>
		<td class="actions">
			<!--<?php echo $this->Html->link(__('Voir', true), array('action' => 'view', $tblCustomer['TblCustomer']['PersNo'])); ?>-->
			<?php echo $this->Html->link(__('Modifier', true), array('action' => 'edit', $tblCustomer['TblCustomer']['PersNo'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $tblCustomer['TblCustomer']['PersNo']), null, sprintf(__('Confirmation suppression # %s?', true), $tblCustomer['TblCustomer']['PersNo'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% de %pages%, montre enregistrements %current% d\'un total de %count% enregistrements, commence à l\'enregistrement %start%, finit à l\'enregistrement %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nouvelle adresse Cocagnard/e', true), array('action' => 'add')); ?></li>
	</ul>
</div>
