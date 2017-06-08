<h3>Rakaman Perbualan Saksi</h3>
<hr />

<form action="<?php echo base_url('case_details/rps_process?account=' . $case->ind_akaun . '&case_type=rps') ?>" method="post" enctype="multipart/form-data" > 
	<div class="form-group">
		<textarea name="content" id="rps" cols="100" rows="10"><?php if ($rps->num_rows() > 0): ?><?php echo $content = $rps->row()->rps_content?><?php endif ?></textarea>
	</div><!-- /.form-group -->
		
	<button id="addpic" class="btn btn-danger">Tambah gambar</button>
	<div id="uploadFileContainer">
	
	</div><!-- /#uploadFileContainer -->


	
<br />
<br />
	<div class="form-group">
		<button type="submit" name="submit" alt="submit" value="submit" >Lengkap</button>
		<button type="submit" name="draf" alt="draf" value="draf" >Draf</button>
	</div><!-- /.form-group -->
</form>



<?php if ($pic->num_rows() > 0): ?>
	<div class="row">
	<h3>Gambar yang telah di muat naik</h3>
		<?php foreach ($pic->result() as $p): ?>
			
			<div class="col-sm-3">
				<img src="<?php echo base_url('assets/uploads/'. $p->pic_name) ?>" class="img-responsive" alt="" />
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('case_details/delete_file?id='. $p->pic_id. '&account=' . $case->ind_akaun) ?>">padam</a>
				<br />
			</div><!-- /.col-sm-3 -->
			
			
		<?php endforeach ?>
	</div><!-- /.row -->	
	<div class="col-sm-3">
		
	</div><!-- /.col-sm-3 -->
<?php endif ?>



<script type="text/javascript">

CKEDITOR.replace( 'rps' );

$( document ).ready(function() {
	$(document).on('click', 'button#addpic', function(e){
		e.preventDefault();
		$('div#submit').css('display', 'block');
		addFileInput();
	});

	function addFileInput(){
		var html = '';
		html += '<div class="alert alert-default">';
		html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color:black">&times;</button>';
		html += '<strong>Upload File</strong>';
		html += '<input type="file" name="userfile[]" />';
		html += '</div>';

		$('div#uploadFileContainer').append(html);
	}
});
	
</script>

