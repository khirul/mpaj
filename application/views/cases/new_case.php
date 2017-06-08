<div class="col-sm-4">
			<form action="<?php echo base_url().'cases/new_case' ?>">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="Taip no akaun..." autofocus />		
				</div><!-- /.form-group -->
				<div class="form-group">
					<input type="submit" value="Search" name="submit" class="btn btn-default" />
				</div><!-- /.form-group -->
			</form>
		</div><!-- /.col-sm-4 -->		
		<div class="col-sm-12">
			<?php if ($results != null): ?>		
				<strong>Jumlah carian : <?php echo $results->num_rows() ?></strong>
				<table class="table table-bordered">
					<tr>
						<td>Bil</td>
						<td>Nama</td>
						<td>Kesalahan</td>
						<td>Tindakan</td>
					</tr>
					
					<?php $bil = 0 ?>
					
					<?php foreach ($results->result() as $r): ?>
						<?php $bil2 = 0 ?>
						<?php foreach ($existed->result() as $e): ?>
							<?php if ($r->IND_AKAUN != $e->ind_akaun): ?>
							
								
							<?php else: ?>
								<?php  $bil2++?>
							<?php endif ?>
							
						<?php endforeach ?>

						<?php if ($bil2==0): ?>
						<?php $bil++ ?>
						<tr>
							<td><?php echo $bil ?></td>
							<td><?php echo $r->IND_PNAMA ?></td>
							<td><?php echo $r->IND_KSLAH ?></td>
							<td><a href="<?php echo base_url().'case_details?account='.$r->IND_AKAUN ?>" class="btn btn-info btn-sm">Buka kes</a></td>
						</tr>
						<?php endif ?>
						
					<?php endforeach ?>
					
				</table>
			<?php else : ?>
				<div class="text-center">
					<p><em>Tiada rekod</em></p>
				</div><!-- /.text-center -->
				
			<?php endif ?>
		</div><!-- /.col-sm-12 -->