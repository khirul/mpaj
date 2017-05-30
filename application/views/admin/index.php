<?php if ($this->session->userdata('current_user')->role == 'super_admin'): ?>
	<?php if ($inactive->num_rows()>0): ?>
		<div class="col-sm-12">
			<div class="alert alert-info">
				<a href="<?php echo base_url('admin/users') ?>">
					<?php echo $inactive->num_rows() ?> admin berdaftar belum diaktifkan
				</a>
			</div>
		</div>
		
		<?php foreach ($inactive as $i): ?>
			
		<?php endforeach ?>
	<?php endif ?>			
<?php endif ?>

