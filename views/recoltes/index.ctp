<?
	//Configure::write('debug', 0);

?>
<div class="recoltes index">
	
	<h2><?php ___('recoltes');?></h2>
	 	
	<?php
	echo $this->element('toolbar/toolbar', array('plugin' => 'alaxos', 'add' => true, 'container_class' => 'toolbar_container_list'));
	?>

	<?php
	echo $this->AlaxosForm->create('Recolte', array('url' => $this->passedArgs)); //'url' => $this->passedArgs allows to keep the sort when searching
	?>
    
	<table cellspacing="0" class="administration">
	
	<tr class="sortHeader">
		<th style="width:5px;"></th>
		<th><?php echo $this->Paginator->sort(__('date', true), 'Recolte.date');?></th>
		<th><?php echo $this->Paginator->sort(__('lib', true), 'Recolte.lib');?></th>
		<th><?php echo $this->Paginator->sort(__('nb_GP', true), 'Recolte.nb_GP');?></th>
		<th><?php echo $this->Paginator->sort(__('nb_PP', true), 'Recolte.nb_PP');?></th>
		<th><?php echo $this->Paginator->sort(__('date_mod', true), 'Recolte.date_mod');?></th>
		<th><?php echo $this->Paginator->sort(__('rem', true), 'Recolte.rem');?></th>
		
		<th class="actions">&nbsp;</th>
	</tr>
	
	<tr class="searchHeader">
		<td></td>
			<td>
			<?php
				echo $this->AlaxosForm->filter_field('date');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('lib');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nb_GP');
			?>
		</td>
		<td>
			<?php
				echo $this->AlaxosForm->filter_field('nb_PP');
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
			echo $this->AlaxosForm->create('Recolte', array('id' => 'chooseActionForm', 'url' => array('controller' => 'recoltes', 'action' => 'actionAll')));
			?>
    	</td>
	</tr>
	
	<?php
	$i = 0;
	foreach ($recoltes as $recolte):
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
		echo $this->AlaxosForm->checkBox('Recolte.' . $i . '.id', array('value' => $recolte['Recolte']['id']));
		?>
		</td>
		<td>
			<?php echo DateTool :: sql_to_date($recolte['Recolte']['date']); ?>
		</td>
		<td>
			<?php #echo $recolte['Recolte']['lib']; ?>
			<?php echo $this->Html->link($recolte['Recolte']['lib'], array('action' => 'view', $recolte['Recolte']['id'])); ?>
						<?php 
						#echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $recolte['Recolte']['id']), array('class' => 'to_detail', 'escape' => false)); ?>

			
		</td>

		<td>
			<?php echo $recolte['Recolte']['nb_GP']; ?>
		</td>
		<td>
			<?php echo $recolte['Recolte']['nb_PP']; ?>
		</td>
		<td>
			<?php echo $recolte['Recolte']['date_mod']; ?>
		</td>
		<td>
			<?php echo $recolte['Recolte']['rem']; ?>
		</td>
		<td class="actions">

			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/loupe.png'), array('action' => 'view', $recolte['Recolte']['id']), array('class' => 'to_detail', 'escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_edit.png'), array('action' => 'edit', $recolte['Recolte']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($this->Html->image('/alaxos/img/toolbar/small_drop.png'), array('action' => 'delete', $recolte['Recolte']['id']), array('escape' => false), sprintf(___("are you sure you want to delete '%s' ?", true), $recolte['Recolte']['lib'])); ?>

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
