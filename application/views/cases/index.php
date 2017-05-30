<?php if ($this->session->userdata('current_user')->role != 'undang-undang'): ?>
	<a href="<?php echo base_url().'cases/new_case' ?>" class="btn btn-success btn-sm">Kes Baru</a>
<?php endif ?>

<table class="table table-boedered">
	<tr class="warning">
		<td>Kes</td>
		<td>Kesalahan</td>
		<td>Tindakan</td>
		<td>Status</td>
	</tr>
	<?php foreach ($cases->result() as $case): ?>
		<tr>
			<td><?php echo $case->ind_pnama ?></td>
			<td><?php echo $case->ind_kslah ?></td>
			<td>
				<?php if ($this->session->userdata('current_user')->role == 'undang-undang'): ?>
					<a href="<?php echo base_url().'case_details?account='.$case->ind_akaun ?>" class="btn btr-default btn-sm">Luluskan</a>
				<?php endif ?>
				<a href="<?php echo base_url().'case_details?account='.$case->ind_akaun ?>" class="btn btr-default btn-sm">view</a>
			</td>
			<td><?php echo $case->case_status ?></td>
		</tr>
	<?php endforeach ?>
</table>