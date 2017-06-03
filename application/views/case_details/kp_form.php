
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
	
	
	<form action="<?php echo base_url('case_details/kp_process?account=' . $case->ind_akaun) ?>" method="post">
	<tr>
		<th>
			Nama Orang Yang Dituduh 
		</th>
		<td>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="kp_nama"><?php if ($check->num_rows() > 0):?><?php echo strtoupper($kp->kp_nama)?><?php else : ?><?php echo strtoupper($case->ind_pnama)?><?php endif ?></textarea>


			<!-- <?php $nama = strtolower($case->ind_pnama) ?>

			<?php echo ucwords($nama) ?> -->
		</td>
	</tr>
	<tr>
		<th>
			No Kad Pengenalan 
		</th>
		<td>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="30" name="kp_psalah_id"><?php if ($check->num_rows() > 0):?><?php echo strtoupper($kp->kp_psalah_id)?><?php else : ?><?php echo strtoupper($case->ind_plgid)?><?php endif ?></textarea>
			<!-- <?php echo strtoupper($case->ind_plgid) ?> -->
		</td>
	</tr>
	<tr>
		<th>
			Alamat Orang Yang Dituduh 
		</th>
		<td>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="kp_add1"><?php if ($check->num_rows() > 0):?><?php echo strtoupper($kp->kp_add1)?><?php else : ?><?php echo strtoupper($case->ind_almt1)?><?php endif ?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="kp_add2"><?php if ($check->num_rows() > 0):?><?php echo strtoupper($kp->kp_add2)?><?php else : ?><?php echo strtoupper($case->ind_almt2)?><?php endif ?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="kp_add3"><?php if ($check->num_rows() > 0):?><?php echo strtoupper($kp->kp_add3)?><?php else : ?><?php echo strtoupper($case->ind_almt3)?><?php endif ?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="kp_add4"><?php if ($check->num_rows() > 0):?><?php echo strtoupper($kp->kp_add4)?><?php else : ?><?php echo strtoupper($case->ind_almt4)?><?php endif ?></textarea>
			<textarea id="ta" class="form-control" style="background-color: white;" rows="1" cols="60" name="kp_add5"><?php if ($check->num_rows() > 0):?><?php echo strtoupper($kp->kp_add5)?><?php else : ?><?php echo strtoupper($case->ind_almt5)?><?php endif ?></textarea>
			
		</td>
	</tr>

	
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
				  <option value="johari bin atli">Johari bin Atli</option>
				  <option value="rashidi bin abdul rahim">Rashidi bin Abdul Rahim</option>
				  <option value="siti sarah binti mohd yahya">Siti Sarah binti Mohd Yahya</option>
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

