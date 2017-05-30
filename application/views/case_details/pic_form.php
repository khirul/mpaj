<h3>Gambar-Gambar</h3>

<button id="addpic" class="btn btn-danger">Tambah gambar</button>
<br />
<br />
<?php echo form_open_multipart('case_details/pic_process?account=' . $case->ind_akaun);?>

	<div id="uploadFileContainer">
		
	</div><!-- /#uploadFileContainer -->
	<div id="submit" style="display: none;">
		<input type="submit" name="submit" value="Simpan" class="btn btn-default" />
	</div><!-- /#submit -->
	
<?php echo form_close() ?>


<script type="text/javascript">

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

