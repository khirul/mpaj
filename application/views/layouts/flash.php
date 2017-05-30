<?php if($this->session->flashdata('success')){ ?>
    <div class="flash alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php }else if($this->session->flashdata('error')){  ?>
    <div class="flash alert alert-danger text-center">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php }else if($this->session->flashdata('warning')){  ?>
    <div class="flash alert alert-warning text-center">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php }else if($this->session->flashdata('danger')){  ?>
    <div class="flash alert alert-danger text-center">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->flashdata('danger'); ?>
    </div>
<?php }else if($this->session->flashdata('info')){  ?>
    <div class="flash alert alert-info text-center">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->flashdata('info'); ?>
    </div>
<?php } ?>