<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <!--<link rel="stylesheet" href="css/main.css"> -->
        <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>" />

        <script src="<?php echo base_url().'assets/js/jquery-3.1.0.min.js'?>" type="text/javascript"></script>
    </head>
    <body>

	<?php $nama = strtolower($case->ind_pnama) ?>
	<?php $add1 = strtolower($case->ind_almt1) ?>
	<?php $add2 = strtolower($case->ind_almt2) ?>
	<?php $add3 = strtolower($case->ind_almt3) ?>
	<?php $add4 = strtolower($case->ind_almt4) ?>
	<?php $add5 = strtolower($case->ind_almt5) ?>

		<div class="container">
			<div class="row">
				<div class="text-center">
					<h4>TANAH MELAYU</h4>
					<span>NEGERI SELANGOR</span>
					<h4>DALAM MAHKAMAH MAJISTRIT</h4>
					<p>Kes Saman No. :  <strong><?php echo ucwords($case->ind_akaun) ?></strong></p>
					<h3>PENGADUAN</h3>
				</div><!-- /.text-center -->
				<div class="text-justify">
					<p>Maklumat dan pengaduan <u><strong><?php echo ($this->session->userdata('current_user')->name) ?></strong></u>, <u><strong><?php echo ucwords($this->session->userdata('current_user')->position) ?></strong></u>, Jabatan <u><strong><?php echo ucwords($this->session->userdata('current_user')->role) ?></strong></u>, Majlis Perbandaran Ampang Jaya, diterima di Ampang, di hadapan saya Majistrit	_______________________ yang bertandatangan di bawah ini pada ______ haribulan	________________	201__. Setelah membuat sumpahan menyatakan bahawa iaitu:-</p>

					<p>Pada ___________ jam	______________	Tengah hari/Petang/Malam saya membuat pemeriksaan di Premis</p>

					<p><strong>	
						<?php echo ucwords($add1),", " ?>
						<?php echo ucwords($add2),", " ?>
						<?php echo ucwords($add3),", " ?>
						<?php echo ucwords($add4),", " ?>
						<?php echo ucwords($add5) ?>
					</strong></p>

					<p>
						Sewaktu dalam pemeriksaan saya Encik/Cik <u><strong><?php echo ($this->session->userdata('current_user')->name) ?></strong></u>, Jabatan	<u><strong><?php echo ucwords($this->session->userdata('current_user')->role) ?></strong></u>, Majlis Perbandaran Ampang Jaya ada bersama saya.
					</p>
					<p>
						Encik/Cik <u><strong><?php echo ucwords($nama) ?></strong></u> No. kad pengenalan <u><strong><?php echo ucwords($case->ind_plgid) ?></strong></u> telah melanggar	<u><strong><?php echo ucwords($kp->kp_ind_kslah) ?></strong></u> , yang mana boleh didenda di bawah	RM <u><strong><?php echo ucwords($case->ind_amaun) ?></strong></u>.
					</p>

					<p>
						Oleh yang demikian Encik/Cik <u><strong><?php echo ($this->session->userdata('current_user')->name) ?></strong></u> yang tersebut memohon <u><strong><?php echo ucwords($nama) ?></strong></u> disaman supaya hadir di hadapan Mahkamah supaya dibicarakan mengikut undang-undang.
					</p>

					<p>
						Diambil dihadapan saya pada hari dan tahun dan di tempat yang saya sebutkan di atas.
					</p>

				</div><!-- /.text-justify -->

				<div class="text-center">
					<p><strong>MAJISTRIT</strong></p>
					<p><strong>MAHKAMAH MAJISTRIT AMPANG</strong></p>
				</div><!-- /.text-center -->
			</div><!-- /.row -->
		</div><!-- /.container -->



	<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/js/material.min.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/js/custom.js'?>" type="text/javascript"></script>
</body>
</html>



<!-- <div class="container">	
	<div class="row">
		<div class="tengah1">TANAH MELAYU</div><br>
		<div class="tengah2">NEGERI SELANGOR</div><br>
		<div class="tengah1">DALAM MAHKAMAH MAJISTRIT</div><br>
		<div class="tengah2">Kes Saman No. :  <strong><?php echo ucwords($case->ind_akaun) ?></strong></div><br>
		<div class="tengah3">PENGADUAN</div><br>
		<span>Maklumat dan pengaduan <strong><?php echo ($this->session->userdata('current_user')->name) ?></strong> , <strong><?php echo ucwords($this->session->userdata('current_user')->position) ?></strong></span><br>
		<span>Jabatan <strong><?php echo ucwords($role->jabatan) ?></strong>, Majlis Perbandaran Ampang Jaya, diterima di Ampang, di hadapan saya</span>
		<span>Majistrit			yang bertandatangan di bawah ini pada</span>
					haribulan			201	. Setelah membuat sumpahan menyatakan bahawa
		iaitu:-
		Pada 			jam				Tengah hari/Petang/Malam saya membuat pemeriksaan di
		<span>Premis</span><br><br>

		<?php $nama = strtolower($case->ind_pnama) ?>
		<?php $add1 = strtolower($case->ind_almt1) ?>
		<?php $add2 = strtolower($case->ind_almt2) ?>
		<?php $add3 = strtolower($case->ind_almt3) ?>
		<?php $add4 = strtolower($case->ind_almt4) ?>
		<?php $add5 = strtolower($case->ind_almt5) ?>

		<span>
			<?php echo ucwords($add1),", " ?><br>
			<?php echo ucwords($add2),", " ?><br>
			<?php echo ucwords($add3),", " ?><br>
			<?php echo ucwords($add4),", " ?><br>
			<?php echo ucwords($add5) ?>
		</span><br><br>


		<span>Sewaktu dalam pemeriksaan saya Encik/Cik <strong><?php echo ($this->session->userdata('current_user')->name) ?></strong>, Jabatan					,</span>
		<span>Majlis Perbandaran Ampang Jaya ada bersama saya.</span>
		<span>Encik/Cik <strong><?php echo ucwords($nama) ?></strong></span><br>
		<span>No. kad pengenalan <strong><?php echo ucwords($case->ind_plgid) ?></strong> telah</span><br>
		<span>melanggar	<strong><?php echo ucwords($case->ind_kslah) ?></strong> , yang mana boleh didenda di</span> <br>
		<span>bawah	RM <strong><?php echo ucwords($case->ind_amaun) ?></strong>.</span>
		<span>Oleh yang demikian Encik/Cik <strong><?php echo ($this->session->userdata('current_user')->name) ?></strong></span><br>
		<span>yang tersebut memohon <strong><?php echo ucwords($nama) ?></strong></span>
		disaman supaya hadir di hadapan Mahkamah supaya dibicarakan mengikut undang-undang.

		Diambil dihadapan saya pada hari dan
		tahun dan di tempat yang saya sebutkan di atas.
	</div>
</div>

 -->