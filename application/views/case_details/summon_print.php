<span class="mahkamah"><?php echo ucwords($saman->mahkamah) ?></span>
<?php $nama = strtolower($case->ind_pnama) ?>
<?php $add1 = strtolower($case->ind_almt1) ?>
<?php $add2 = strtolower($case->ind_almt2) ?>
<?php $add3 = strtolower($case->ind_almt3) ?>
<?php $add4 = strtolower($case->ind_almt4) ?>
<?php $add5 = strtolower($case->ind_almt5) ?>
<!-- <?php $salah = strtolower($case->ind_kslah) ?> -->


<span class="pesalah"><?php echo ucwords($nama) ?></span>
<span class="alamat"><?php echo ucwords($add1),", ", ucwords($add2),", ", ucwords($add3),", ", ucwords($add4),", ", ucwords($add5) ?></span>

<span class="kesalahan"><div class="lebar"><?php echo ($case->ind_kslah) ?></div></span>


<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    
    window.print();
}
</script>




<style type="text/css">
.mahkamah{
	position: fixed;
	top: 55px;
	left: 300px;
	width:900px;

	font-size: 12px;
}

.pesalah{
	position: fixed;
	top: 125px;
	left: 95px;

	font-size: 12px;
}

.alamat{
	position: fixed;
	top: 150px;
	left: 150px;

	font-size: 12px;
}

.kesalahan{
	position: fixed;
	top: 190px;
	left: 50px;

	font-size: 12px;
}

.lebar{
	width:600px;
	text-align: justify;
}
</style>