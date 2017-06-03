
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
					echo strtoupper($saman->mahkamah); 
				}
				?>
				
		</td>
	</tr>
	
	
	<form action="<?php echo base_url('case_details/aduan_process?account=' . $case->ind_akaun) ?>" method="post">

	<?php 	if ($check->num_rows() > 0):
				$adu_kslah		=strtolower($adu->adu_kslah);
				$adu_pegawai	=strtolower($adu->adu_pegawai);
				$adu_add1		=strtolower($adu->adu_add1);
				$adu_add2		=strtolower($adu->adu_add2);
				$adu_add3		=strtolower($adu->adu_add3);
				$adu_add4		=strtolower($adu->adu_add4);
				$adu_add5		=strtolower($adu->adu_add5);
				$adu_psalah_id	=strtolower($adu->adu_psalah_id);
				$adu_psalah_nama=strtolower($adu->adu_psalah_nama);
				$adu_jab		=strtolower($adu->adu_jab);
				$adu_jaw		=strtolower($adu->adu_jaw);
				$adu_amaun		=strtolower($adu->adu_amaun);
			
			else : 
				$adu_kslah		=strtolower($case->ind_kslah);
				$adu_pegawai	=strtolower($this->session->userdata('current_user')->name);
				$adu_add1		=strtolower($case->ind_almt1);
				$adu_add2		=strtolower($case->ind_almt2);
				$adu_add3		=strtolower($case->ind_almt3);
				$adu_add4		=strtolower($case->ind_almt4);
				$adu_add5		=strtolower($case->ind_almt5);
				$adu_psalah_id	=strtolower($case->ind_plgid);
				$adu_psalah_nama=strtolower($case->ind_pnama);
				$adu_jab		=strtolower($role->jabatan);
				$adu_jaw		=strtolower($this->session->userdata('current_user')->position);
				$adu_amaun		=strtolower($case->ind_amaun) ;
			endif


	?>


	<tr>
		<th>Nama Orang Yang Dituduh</th>
		<td><textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_psalah_nama"><?php echo strtoupper($adu_psalah_nama)?></textarea></td>
	</tr>
	<tr>
		<th>No Kad Pengenalan</th>
		<td><textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="30" name="adu_psalah_id"><?php echo strtoupper($adu_psalah_id)?></textarea></td>
	</tr>
	<tr>
		<th>Alamat Orang Yang Dituduh</th>
		<td>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_add1"><?php echo strtoupper($adu_add1)?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_add2"><?php echo strtoupper($adu_add2)?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_add3"><?php echo strtoupper($adu_add3)?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_add4"><?php echo strtoupper($adu_add4)?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_add5"><?php echo strtoupper($adu_add5)?></textarea>			
		</td>
	</tr>
	<tr>
		<th>Pertuduhan</th>
		<td><textarea id="ta" class="form-control" style="background-color: white;" rows="10" cols="60" name="adu_kslah"><?php echo strtoupper($adu_kslah)?></textarea></td>
	</tr>
	<tr>
		<th>Nama Pengadu</th>
		<td><textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_pegawai"><?php echo strtoupper($adu_pegawai)?></textarea></td>
	</tr>
	<tr>
		<th>Jawatan</th>
		<td><textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_jaw"><?php echo strtoupper($adu_jaw)?></textarea></td>
	</tr>
	<tr>
		<th>Jabatan</th>
		<td><textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_jab"><?php echo strtoupper($adu_jab)?></textarea></td>
	</tr>
	<tr>
		<th>Amaun Saman</th>
		<td><textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="adu_amaun"><?php echo strtoupper($adu_amaun)?></textarea></td>
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

