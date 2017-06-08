<h3>Tindakan</h3>
<hr />

<form action="<?php echo base_url('cases/tindakan_process?id=' . $case->case_id . '&case_type=kr') ?>" method="post" enctype="multipart/form-data" > 

	<input type="radio" name="tindakan" value="lulus"> Di luluskan &nbsp;&nbsp;&nbsp;
  	<input type="radio" name="tindakan" value="gagal"> Di kembalikan<br>
<br>
<label>Sebab di kembalikan</label>
	<div class="form-group">
		<textarea name="content" id="tindak" cols="100" rows="10"></textarea>
	</div><!-- /.form-group -->
		
	
	
<br />
<br />
	<div class="form-group">
		<button type="submit" name="submit" alt="submit" value="submit" >Proses</button>
	</div><!-- /.form-group -->
</form>







<script type="text/javascript">

CKEDITOR.replace( 'tindak' );

$( document ).ready(function() {
	$(document).on('click', 'button#addpic', function(e){
		e.preventDefault();
		$('div#submit').css('display', 'block');
		addFileInput();
	});

	
});
	
</script>

