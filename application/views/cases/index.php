<?php if ($this->session->userdata('current_user')->role != 'undang-undang'): ?>
	<a href="<?php echo base_url().'cases/new_case' ?>" class="btn btn-success btn-sm">Kes Baru</a>
<?php endif ?>

<table class="table table-boedered">
	<tr class="warning">
		<td>Kes</td>
		<td>Kesalahan</td>
		<td>Tindakan</td>
		<td>Status</td>
		<td>Catatan</td>
	</tr>
	<?php foreach ($cases->result() as $case): ?>
		
		<tr>
			<td><?php echo $case->ind_pnama ?></td>
			<td><?php echo $case->ind_kslah ?></td>
			<td>
				<?php if ($this->session->userdata('current_user')->role == 'undang-undang'): ?>
					<a href="<?php echo base_url().'cases/tindakan?id='.$case->case_id ?>" class="btn btr-default btn-sm">Tindakan</a>
				<?php endif ?>
				<a href="<?php echo base_url().'case_details?account='.$case->ind_akaun ?>" class="btn btr-default btn-sm">view</a>
				<?php if ($this->session->userdata('current_user')->role != 'undang-undang' && $case->case_status!='lulus'  && $case->case_status!='submited'): ?>
					<a href="<?php echo base_url().'cases/hantar?id='.$case->case_id ?>" class="btn btr-default btn-sm">Hantar ke JU</a>
				<?php endif ?>
				
			</td>
			<td><?php echo $case->case_status ?></td>
			</td>
			<td><?php echo $case->case_note ?></td>
		</tr>
	<?php endforeach ?>
</table>