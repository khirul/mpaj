<div class="pen-title">
  <h1>Sistem eIP</h1><span>Ver 1.0.0</span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"></div>
  <div class="form">
    <h2>Log masuk ke panel kawalan</h2>
    <form action="<?php echo base_url('access/attempt_login') ?>" method="post">
      <input type="text" placeholder="Id pengguna" name="username" value="<?php echo set_value('username') ?>" />
      <input type="password" placeholder="Kata laluan" name="password" />
      <button>Log Masuk</button>
    </form>
    <div class="text-center">
      <small>Daftar sebagai <a href="<?php echo base_url('access/register') ?>">admin</a></small>     
    </div>
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger text-center">
        <?php echo validation_errors() ?>
        </div><!-- /.alert -->
      <?php endif ?>
  </div>
</div>