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
			<?php  				
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
			?>


		<div class="container">
			<div class="row">
				<div class="text-center">
					<h4>TANAH MELAYU</h4>
					<span>NEGERI SELANGOR</span>
					<h4>DALAM MAHKAMAH MAJISTRIT</h4>
					<p>Kes Saman No. :  ___________________</p>
					<h3>PENGADUAN</h3>
				</div><!-- /.text-center -->
				<div class="text-justify atur">
					<p>Maklumat dan pengaduan   <u class="huruf">  <?php echo strtoupper($adu_pegawai) ?> ( <?php echo strtoupper($adu_jaw) ?> )</u>, Jabatan <u class="huruf"><?php echo strtoupper($adu_jab) ?></u>, Majlis Perbandaran Ampang Jaya, diterima di Ampang, di hadapan saya Majistrit	_______________________ yang bertandatangan di bawah ini pada ______ haribulan	________________	201__. Setelah membuat sumpahan menyatakan bahawa iaitu:-</p>

					<p>Pada ___________ jam	______________	Tengah hari/Petang/Malam saya membuat pemeriksaan di Premis</p>

					<u><p class="huruf">	
						<?php echo strtoupper($adu_add1),", " ?>
						<?php echo strtoupper($adu_add2),", " ?>
						<?php echo strtoupper($adu_add3),", " ?>
						<?php echo strtoupper($adu_add4),", " ?>
						<?php echo strtoupper($adu_add5) ?>
					</p></u>

					<p>
						Sewaktu dalam pemeriksaan saya Encik/Cik __________________________________ Majlis Perbandaran Ampang Jaya ada bersama saya.
					</p>
					<p>
						Encik/Cik <u class="huruf"><?php echo strtoupper($adu_psalah_nama) ?></u> No. kad pengenalan <u class="huruf"><?php echo strtoupper($adu_psalah_id) ?></u> telah melanggar	<u class="huruf"><?php echo strtoupper($adu_kslah) ?></u> , yang mana boleh didenda di bawah	RM <u class="huruf"><?php echo strtoupper($adu_amaun) ?></u>.
					</p>

					<p>
						Oleh yang demikian Encik/Cik <u class="huruf"><?php echo strtoupper($adu_pegawai) ?></u> yang tersebut memohon <u class="huruf"><?php echo strtoupper($adu_psalah_nama) ?></u> disaman supaya hadir di hadapan Mahkamah supaya dibicarakan mengikut undang-undang.
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


<style type="text/css">
	.atur{
		font-size: 17px;
		line-height: 4;
		font-family: times;
	}

	.huruf{
		font-family: arial;
		font-size: 18px;
	}
</style>