
<?php if (validation_errors()): ?>
	<div class="alert alert-danger text-center">
		<?php echo validation_errors() ?>
	</div><!-- /.alert -->
<?php endif ?>

<br>

<table class="table table-bordered">
	<tr>
		<th>
			Mahkamah 
		</th>
		<td>
			<?php 
				if(($saman->mahkamah)==null){ 
					echo "Data belum dimasukkan";
				}
				else
				{
					echo ucwords($saman->mahkamah); 
				}
				?>
				
		</td>
	</tr>
	<tr>
		<th>
			Nama Orang Yang Dituduh 
		</th>
		<td>
			<?php $nama = strtolower($case->ind_pnama) ?>

			<?php echo ucwords($nama) ?>
		</td>
	</tr>
	<tr>
		<th>
			No Kad Pengenalan 
		</th>
		<td>
			<?php echo ucwords($case->ind_plgid) ?>
		</td>
	</tr>
	<tr>
		<th>
			Alamat Orang Yang Dituduh 
		</th>
		<td>
			<?php $add1 = strtolower($case->ind_almt1) ?>
			<?php $add2 = strtolower($case->ind_almt2) ?>
			<?php $add3 = strtolower($case->ind_almt3) ?>
			<?php $add4 = strtolower($case->ind_almt4) ?>
			<?php $add5 = strtolower($case->ind_almt5) ?>

			<?php echo ucwords($add1),", ", ucwords($add2),", ", ucwords($add3),", ", ucwords($add4),", ", ucwords($add5) ?>
		</td>
	</tr>

	<form action="<?php echo base_url('case_details/kp_process?account=' . $case->ind_akaun) ?>" method="post">
		<tr>
			<th>
				Pertuduhan 
			</th>

			<td>
				<textarea id="ta" class="form-control" style="background-color: white;" rows="10" cols="60" name="kp_ind_kslah"><?php if ($check->num_rows() > 0):?><?php echo ucwords($kp->kp_ind_kslah)?><?php else : ?><?php echo ucwords($case->ind_kslah)?><?php endif ?></textarea>
			</td>
		</tr>
		<tr>
			<th>
				Peguam atau Pegawai Pendakwa 
			</th>
			<td>
				<select name="kp_pegawai">
				  <option value="Pendakwa 1">Pendakwa 1</option>
				  <option value="Pendakwa 2">Pendakwa 2</option>
				  <option value="Pendakwa 3">Pendakwa 3</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>
				
			</th>
			<td>
				<button class="btn btn-success btn-sm" type="submit" alt="submit" name="submit" value="submit">Lengkap</button>	
				<button class="btn btn-warning btn-sm" type="submit" alt="draf" name="draf" value="draf">Draf</button>	
			</td>
				
		</tr>
		
	</form>
</table>

