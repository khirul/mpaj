<?php if ($inactive->num_rows() > 0): ?>
	<h3>Senarai permohonan admin yang baru</h3>
	<table class="table table-bordered">
		<tr>
			<th>Permohonan</th>
			<th>Jawatan</th>
			<th>Jabatan</th>
			<th>Tindakan</th>
		</tr>			
		
		<?php foreach ($inactive->result() as $i): ?>
			<tr>
				<td><?php echo $i->name ?></td>
				<td><?php echo $i->position ?></td>
				<td><?php echo $i->jabatan ?></td>
				<td><a href="<?php echo base_url('admin/update_user/' . $i->user_id) ?>" class="btn btn-success btn-sm">Aktifkan</a></td>
			</tr>
		<?php endforeach ?>
	</table>
<?php endif ?>

<?php if ($active->num_rows() > 1): ?>
	<h3>Senarai admin yang aktif</h3>

	<table class="table table-bordered">
		<!-- <tr>
			<th>Permohonan</th>
			<th>Jawatan</th>
			<th>Jabatan</th>
			<th>Tindakan</th>
		</tr> -->
		<?php foreach ($active->result() as $i): ?>
			<?php if ($i->role != 'super_admin'): ?>
				<tr>
					<td><?php echo ucwords($i->name) ?></td>
					<td><?php echo ucwords($i->position) ?></td>
					<td><?php echo ucwords($i->jabatan) ?></td>
					<td><a href="<?php echo base_url('admin/update_user/' . $i->user_id) ?>" class="btn btn-danger btn-sm">Sekat</a></td>
				</tr>
			<?php endif ?>
		<?php endforeach ?>
	</table>
<?php endif ?>