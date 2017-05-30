Nama : <?php echo $case->ind_pnama ?>
<br>
Kesalahan : <?php echo $case->ind_kslah ?>
<br>
<br>

<form action="<?php echo base_url().'case_details/form_process?account='. $case->ind_akaun ?>" method="post">

	<div class="form-group">
		<label for="mahkamah">Perlu hadir di mahkamah:</label>
		<!-- <input type="text" class="form-control" name="mahkamah" value="<?php 
			if ($saman != NULL) {
				echo $saman->mahkamah ;
			}					
		?>" > -->
		<select name="mahkamah">
			<option value="mahkamah sesyen ampang">Mahkamah Sesyen Ampang</option>
			<option value="mahkamah majistrit ampang">Mahkamah Majistrit Ampang</option>
		</select>
	</div>

	<!-- <div class="form-group">
		<label for="tarikh_hadir">Tarikh hadir ke mahkamah:</label>
		<input type="date" class="form-control" name="tarikh_hadir" value="<?php 
			if ($saman != NULL) {
				echo date('Y-m-d', strtotime($saman->tarikh_hadir)) ;
			}					
		?>">
	</div>

	<div class="form-group">
		<label for="tarikh_saman">Tarikh saman dikeluarkan:</label>
		<input type="date" class="form-control" name="tarikh_saman" value="<?php 
			if ($saman != NULL) {
				echo date('Y-m-d', strtotime($saman->tarikh_saman)) ;
			}					
		?>">
	</div> -->

	<div class="form-group">
		<button type="submit" name="submit" alt="submit" value="submit" >Lengkap</button>
		<button type="submit" name="draf" alt="draf" value="draf" >Draf</button>
	</div>

</form>

<br>
<?php if (validation_errors()): ?>
	<div class="alert alert-danger text-center">
		<?php echo validation_errors() ?>
	</div><!-- /.alert -->
<?php endif ?>