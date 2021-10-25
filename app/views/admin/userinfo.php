 <?php $this->layout('template', ['title' => 'users']) ?>
 <?php 
d($user);
  ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blank page
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $user->username;?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				<label>Имя</label><br>
				<?php echo $user->username;?>
            </div>
			<div class="box-body">
				<label></label><br>
            	 
            </div>
            <div class="box-body">
            <label>Email</label><br>
              <?php echo $user->email;?>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <a href="/admin/user/delete/<?php echo $user->id;?>" class="btn btn-warning">Удалить</a>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->