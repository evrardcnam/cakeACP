<div class="legumes index">
	
	<h2><?php ___('legumes');?></h2>
	 	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Legume', array('url' => $this->passedArgs)); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('lib', true), 'Legume.lib');?></th>
		<th><?php echo $this->Paginator->sort(__('unite', true), 'Legume.unite_id');?></th>
		<th><?php echo $this->Paginator->sort(__('classification', true), 'Legume.classification_id');?></th>
		<th><?php echo $this->Paginator->sort(__('img', true), 'Legume.img');?></th>
		<th><?php echo $this->Paginator->sort(__('date_mod', true), 'Legume.date_mod');?></th>
		<th><?php echo $this->Paginator->sort(__('rem', true), 'Legume.rem');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('lib');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('unite_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('classification_id');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('img');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('date_mod');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('rem');
			?>
		</td>
		<td class="searchHeader" style="width:80px">
    		<div class="submitBar">
    					<?php echo $this->AlaxosForm->end(___('search', true));?>
    		</div>
    		
    		<?php
			echo $this->AlaxosForm->create('Legume', array('id' => 'chooseActionForm', 'url' => array('controller' => 'legumes', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($legumes as $legume):
		$class = null;
		if ($i++ % 2 == 0)
		{
			$class = ' class="row"';
		}
		else
		{
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
		<?php
		echo $this->AlaxosForm->checkBox('Legume.' . $i . '.id', array('value' => $legume['Legume']['id']));
		?>
		</td>
		<td>
			<?php echo $legume['Legume']['lib']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($legume['Unite']['lib'], array('controller' => 'unites', 'action' => 'view', $legume['Unite']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($legume['Classification']['lib'], array('controller' => 'classifications', 'action' => 'view', $legume['Classification']['id'])); ?>
		</td>
		<td>
			<?php echo $legume['Legume']['img']; ?>
		</td>
		<td>
			<?php echo $legume['Legume']['date_mod']; ?>
		</td>
		<td>
			<?php echo $legume['Legume']['rem']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $legume['Legume']['id']), array('class' => 'to_detail', 'escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $legume['Legume']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $legume['Legume']['id']), array('escape' => false), sprintf(___("are you sure you want to delete '%s' ?", true), $legume['Legume']['lib'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 |
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>	 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<?php
if($i > 0)
{
	echo '<div class="choose_action">';
	echo ___d('alaxos', 'action to perform on the selected items', true);
	echo '&nbsp;';
	echo $this->AlaxosForm->input_actions_list();
	echo '&nbsp;';
	echo $this->AlaxosForm->end(array('label' =>___d('alaxos', 'go', true), 'div' => false));
	echo '</div>';
}
?>
	
</div>
