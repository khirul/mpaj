<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h3>Tambah admin</h3>
			<hr>
		</div>
		<div class="col-sm-7">
			<div class="well">
				<form action="<?php echo base_url('admin/post_new') ?>" method = "post">
					<div class="form-group">
						<label for="username">Sila pilih Id Pengguna :</label>
						<input type="text" name="username" value="<?php echo set_value('username') ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Kata Laluan :</label>
						<input type="password" name="password" class="form-control">
					</div>
					<h3>Butiran Peribadi</h3>
					<div class="form-group">
						<label for="name">Nama Penuh :</label>
						<input type="text" name="name" value="<?php echo set_value('name') ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat :</label>
						<input type="text" name="alamat" value="<?php echo set_value('alamat') ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="position">Jawatan :</label>
						<input type="text" name="position" value="<?php echo set_value('position') ?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="role">Jabatan :</label>
						<select name="role" value="<?php echo set_value('role') ?>" class="form-control">
							<option selected="true" disabled="true">Sila pilih jabatan</option>
							<?php foreach ($roles->result() as $role): ?>
								<?php if ($role->role_name != 'super_admin'): ?>
									<option value="<?php echo $role->role_name ?>"><?php echo ucwords($role->jabatan) ?></option>
								<?php endif ?>								
							<?php endforeach ?>
						</select>
						<div class="form-group">
							<input type="submit" name="submit" value="Daftar" class="btn btn-default">
						</div>
					</div>
				</form>
			</div>
		</div>	


		<div class="col-sm-5">
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger">
					<?php echo validation_errors() ?>
				</div>
			<?php endif ?>
			<?php if ($this->session->flashdata('unique')): ?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('unique'); ?>
				</div>
				
			<?php endif ?>
		</div>	
	</div>
</div>