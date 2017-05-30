<div class="col-sm-8 col-sm-offset-2 well">
	<div class="row text-right">
		<small>(Mahkamah 111 - Pin. 1/85)</small>
	</div><!-- /.row -->
<br>
	<div class="row">
		<div class="col-sm-3">			
		</div><!-- /.col-sm-3 -->
		<div class="col-sm-6 text-center">
			<strong>NEGERI-NEGERI TANAH MELAYU</strong>
		</div><!-- /.col-sm-6 -->
		<div class="col-sm-3">			
		</div><!-- /.col-sm-3 -->
	</div><!-- /.row -->
<br>
	<div class="row small">
		<div class="col-sm-5 text-right">
			Dalam Mahkamah
		</div><!-- /.col-sm-3 -->
		<div class="col-sm-1 text-center">
			<div class="row">Sesyen</div><!-- /.row -->
			<div class="row">Majistrit</div><!-- /.row -->
		</div><!-- /.col-sm-1 -->
		<div class="col-sm-6">
			di <strong><?php echo ucwords($saman->mahkamah) ?></strong>
		</div><!-- /.col-sm-8 -->
	</div><!-- /.row -->
<br>
	<div class="row small">
		<div class="col-sm-5 text-right">		
		</div><!-- /.col-sm-3 -->
		<div class="col-sm-1 text-center">
			<strong>SAMAN</strong>
		</div><!-- /.col-sm-1 -->
		<div class="col-sm-6">			
		</div><!-- /.col-sm-8 -->
	</div><!-- /.row -->
<br>
	<div class="row small">
		<div class="col-sm-12">
			Kepada <?php echo $case->ind_pnama ?>
		</div>		
	</div>
<br>	
	<div class="row small">
		<div class="col-sm-12">
			yang beralamat di <?php echo $case->ind_almt1. ','.$case->ind_almt2. ','.$case->ind_almt3. ','.$case->ind_almt4. ','.$case->ind_almt5 ?>
		</div>
	</div>
<br>
	<div class="row small">	
		<div class="col-sm-12 tab">
			Bahawasanya kehadiran kamu adalah perlu bagi menjawap pertuduhan, iaitu:
			<p><?php echo $case->ind_kslah ?></p>			
		</div>
	</div>

	<br>
	<br>
	<br>

	<div class="row small">
		<div class="col-sm-12">
		
			<span class="tab">Dengan ini kamu adalah dikehendaki hadir sendiri dihadapan Mahkamah yang tersebut pada .........</span>
			<p>
				haribulan .............. 20....... pada pukul.......................pagi
			</p>
			<span class="tab">
			<div class="row">
				<div class="col-sm-8">
					<span class="tab">Bertarikh pada...........................haribulan.................................20.........
					</span>
				</div>
				<div class="col-sm-2">
					Hakim <br>
					Pendaftar <br>
					Majistrit
				</div>
			</div>
		</div>
	</div>
</div>	
<button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    
    window.print();
}
</script>