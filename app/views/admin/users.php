 <?php $this->layout('template', ['title' => 'users']) ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Simple Tables
      <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Simple</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="box-body">

        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Все пользователи</h3>
                <div class="box-tools">
                  <div class="input-group" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Статус</th>
                    <th>Email</th>
                    <th></th>
                  </tr>

                  <?php foreach ($users as $user):?>
                  <tr>
                    <td><?php echo $user->id;?></td>
                    <td><?php echo $user->username;?></td>
                    <!-- label label-danger  для статуса-->
                    <td><?php echo $user->email;?></td>
                    <td><span class="label label-success"><?php 
                               if ($user->status == 0) {
                                 echo "Доступ есть";
                               } elseif ($user->status == 1) {
                                 echo "Заблокирован";
                               }


                              ?></span></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="...">
                      <a href="/admin/user/<?php echo $user->id;?>"><button type="button" class="btn btn-primary">Информация</button></a>
                    </div>
                    </td>
                  </tr>
                <?php endforeach;?>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
        </div>
      </div>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
