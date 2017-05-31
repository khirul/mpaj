<h3>Keterangan Ringkas</h3>
<hr />

<form action="<?php echo base_url('case_details/ringkas_process?account=' . $case->ind_akaun) ?>" method="post" > 
	<div class="form-group">
		<textarea name="content" id="ringkas" cols="100" rows="10"><?php if ($kr->num_rows() > 0): ?><?php echo $content = $kr->row()->kr_content?><?php endif ?></textarea>
	</div><!-- /.form-group -->
	<div class="form-group">
		<button type="submit" name="submit" alt="submit" value="submit" >Lengkap</button>
		<button type="submit" name="draf" alt="draf" value="draf" >Draf</button>
	</div><!-- /.form-group -->
</form>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'ringkas' );
</script>

