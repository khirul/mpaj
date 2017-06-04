
<?php if ($this->session->flashdata('up_error')): ?>
<?php $err = $this->session->flashdata('up_error') ?>

	<div class="alert alert-danger">
		<strong>
			<?php echo count($err) . ' fail gagal di muatnaik :' ?>
			<p>&nbsp;&nbsp;&nbsp;<?php echo '	- Melebihi saiz yang dibenarkan' ?></p>
		</strong>
	</div><!-- /.alert alert-danger -->
	
<?php endif ?>

NAMA : 
<?php echo $case->ind_pnama ?>
<br />
KESALAHAN : <?php echo $case->ind_kslah ?>
<br />

<?php if ($summon != NULL): ?>
	<?php if ($summon->saman_status === 'lengkap') : ?>
		<?php $status = 'success' ?>
		<?php $disable = '' ?>
	<?php else :?>
		<?php $status = 'warning' ?>
		<?php $disable = 'disabled' ?>
	<?php endif ?>
<?php else :?>
	<?php
	$summon = new stdclass();
	 $status = 'danger';
	 $summon->saman_status = 'tidak lengkap';
	 $disable = 'disabled';
	 ?>
<?php endif ?>

<?php if ($kp != NULL): ?>
	<?php if ($kp->kp_status === 'lengkap') : ?>
		<?php $kpstatus = 'success' ?>
		<?php $kpdisable = '' ?>
	<?php else :?>
		<?php $kpstatus = 'warning' ?>
		<?php $kpdisable = 'disabled' ?>
	<?php endif ?>
<?php else :?>
	<?php
	$kp = new stdclass();
	 $kpstatus = 'danger';
	 $kp->kp_status = 'tidak lengkap';
	 $kpdisable = 'disabled';
	 ?>
<?php endif ?>

<?php if ($kr != NULL): ?>
	<?php if ($kr->kr_status === 'lengkap') : ?>
		<?php $krstatus = 'success' ?>
		<?php $krdisable = '' ?>
	<?php else :?>
		<?php $krstatus = 'warning' ?>
		<?php $krdisable = 'disabled' ?>
	<?php endif ?>
<?php else :?>
	<?php
	$kr = new stdclass();
	 $krstatus = 'danger';
	 $kr->kr_status = 'tidak lengkap';
	 $krdisable = 'disabled';
	 ?>
<?php endif ?>

<table class="table table-bordered">
			<tr class="info">
				<th>DOKUMEN-DOKUMEN YANG DIPERLUKAN</th>
				<th>TINDAKAN</th>
				<th>STATUS</th>
			</tr>	
			<tr>
				<td>Saman</td>
				<td>
					<a href="<?php echo base_url().'case_details/summon_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm">Kemaskini</a>
					<a href="<?php echo base_url().'case_details/summon_print?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">cetak</a>
				</td>
				<td class= "<?php echo $status ?>"><?php echo $summon->saman_status ?></td>
			</tr>
			<tr>
				<td>Kertas Pertuduhan / Charge Sheet</td>
				<td><a href="<?php echo base_url().'case_details/kp_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a>
				<a href="<?php echo base_url().'case_details/kp_print?account='. $case->ind_akaun ?>" id="sbutton" class="btn btn-default btn-sm <?php echo $kpdisable ?>">cetak</a>
				</td>
				<td class= <?php echo $kpstatus ?>><?php echo $kp->kp_status ?></td>
			</tr>		
			<tr>
				<td>Pengaduan</td>
				<td>
				<a href="<?php echo base_url().'case_details/aduan_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $kpdisable ?>">Kemaskini</a>
				<a href="<?php echo base_url().'case_details/aduan_print?account='. $case->ind_akaun ?>" id="sbutton" class="btn btn-default btn-sm <?php echo $kpdisable ?>">cetak</a>
				</td>
				</td>
				<td class= <?php echo $kpstatus ?>><?php echo $kp->kp_status ?></td>
			</tr>	
			<tr>
				<td>Keterangan Ringkas</td>
				<td><a href="<?php echo base_url().'case_details/ringkas_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $krstatus ?>><?php echo $kr->kr_status ?></td>
			</tr>	
			<tr>
				<td>Fakta Kes</td>
				<td><a href="<?php echo base_url().'case_details/fakta_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $krstatus ?>><?php echo $kr->kr_status ?></td>
			</tr>	
			<tr>
				<td>Diari Siasatan</td>
				<td><a href="<?php echo base_url().'case_details/diari_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $krstatus ?>><?php echo $kr->kr_status ?></td>
			</tr>	
			<tr>
				<td>Gambar-Gambar</td>
				<td><a href="<?php echo base_url().'case_details/gambar_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $krstatus ?>><?php echo $kr->kr_status ?></td>
			</tr>		
			<tr>
				<td>Rajah Kasar Lokasi</td>
				<td><a href="<?php echo base_url().'case_details/rajah_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $krstatus ?>><?php echo $kr->kr_status ?></td>
			</tr>	
			<tr>
				<td>Carian SSM atau Pejabat Tanah atau JPN atau Insolvensi atau Cukai Taksiran</td>
				<td><a href="<?php echo base_url().'case_details/ssm_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>	
			<tr>
				<td>Carian JPJ</td>
				<td><a href="<?php echo base_url().'case_details/jpj_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>	
			<tr>
				<td>laporan Tugasan Pegawai Serbuan (RO)</td>
				<td><a href="<?php echo base_url().'case_details/ro_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>	
			<tr>
				<td>Rakaman Percakapan Saksi</td>
				<td><a href="<?php echo base_url().'case_details/rps_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>
			<!--<tr>
				<td>Borang Inventori Sitaan</td>
				<td><a href="" class="btn btn-default btn-sm">Kemaskini</a></td>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>	
			<tr>
				<td>Borang Serahan Barang Kes RO kepada IO</td>
				<td><a href="" class="btn btn-default btn-sm">Kemaskini</a></td>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>-->	
			<tr>
				<td>Notis Peringatan</td>
				<td><a href="<?php echo base_url().'case_details/np_form?account='. $case->ind_akaun ?>" class="btn btn-default btn-sm <?php echo $disable ?>">Kemaskini</a></td>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>	
			<!--<tr>
				<td>Kompaun</td>
				<td><a href="" class="btn btn-default btn-sm">Kemaskini</a></td>
				<td class= <?php echo $status ?>>Tidak lengkap</td>
			</tr>		 -->
		</table>
