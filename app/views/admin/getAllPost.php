<?php $this->layout('template', ['title' => 'Все посты']);
$col = 1;
 ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Hover Data Table</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Название</th>
                  <th>Автор</th>
                  <th>Просмотры</th>
                  <th>Коментанрие</th>
                  <th></th>
                  <th></th>
                  <th>Действие</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach ($posts as $post):?>
                 <tr>
                  <td><?php echo $col; $col++ //нумерация?></td>
                   <td><?php echo $post->title;?></td>
                   <td><?php echo $post->about;?></td>
                   <td>95</td>
                   <td>6</td>
                   <th></th>
                   <th></th>
                   <td>
                     <div class="btn-group" role="group" aria-label="...">
                      <a href="/admin/posts/<?php echo $post->id;?>"><button type="button" class="btn btn-primary">Посмотреть</button></a>

                      <a href="/admin/updatePost/<?php echo $post->id;?>" type="button" class="btn btn-warning">Изменить</a>
                       <a href="/admin/deletePost/<?php echo $post->id;?>" class="btn btn-warning">Удалить</a>
                    </div>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</section>
