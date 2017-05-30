<span class="mahkamah"><?php echo ucwords($saman->mahkamah) ?></span>



<?php $nama = strtolower($case->ind_pnama) ?>
<?php $add1 = strtolower($case->ind_almt1) ?>
<?php $add2 = strtolower($case->ind_almt2) ?>
<?php $add3 = strtolower($case->ind_almt3) ?>
<?php $add4 = strtolower($case->ind_almt4) ?>
<?php $add5 = strtolower($case->ind_almt5) ?>
<!-- <?php $salah = strtolower($case->ind_kslah) ?> -->


<span class="pesalah"><?php echo ucwords($nama) ?></span>
<span class="ic"><?php echo ucwords($case->ind_plgid) ?></span>
<span class="alamat"><?php echo ucwords($add1),", ", ucwords($add2),", ", ucwords($add3),", ", ucwords($add4),", ", ucwords($add5) ?></span>

<span class="kesalahan"><div class="lebar"><?php echo ($kp->kp_ind_kslah) ?></div></span>

<span class="pegawai"><div class="lebar2"><?php echo ucwords($this->session->userdata('current_user')->name) ?></div></span>

<span class="add_pegawai"><?php echo ucwords($this->session->userdata('current_user')->alamat) ?></span>

<span class="peguam"><?php echo ucwords($kp->kp_pegawai) ?></span>

<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    
    window.print();
}
</script>




<style type="text/css">
.mahkamah{
	position: fixed;
	top: 15px;
	left: 300px;
	width:900px;

	font-size: 12px;
}

.pesalah{
	position: fixed;
	top: 92px;
	left: 185px;

	font-size: 11px;
}

.ic{
	position: fixed;
	top: 108px;
	left: 185px;

	font-size: 11px;
}

.alamat{
	position: fixed;
	top: 130px;
	left: 185px;

	font-size: 11px;
}

.pegawai{
	position: fixed;
	top: 475px;
	left: 242px;

	font-size: 11px;
}

.add_pegawai{
	position: fixed;
	top: 515px;
	left: 242px;

	font-size: 11px;
}

.peguam{
	position: fixed;
	top: 720px;
	left: 310px;

	font-size: 11px;
}



.kesalahan{
	position: fixed;
	top: 190px;
	left: 120px;

	font-size: 10px;
}

.lebar{
	width:550px;
	text-align: justify;
}

.lebar2{
	width:300px;
	text-align: justify;
}

@media print{
	button, .Header, .Footer{
		display: none !important;
	}

}
</style>