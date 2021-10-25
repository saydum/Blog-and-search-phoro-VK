<?php $this->layout('template', ['title' => 'Добавить запись']) ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Изменить пост
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">posts</a></li>
			<li class="active">add post</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">

						<!-- tools box -->
						<div class="pull-right box-tools">
							<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
							<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
						</div><!-- /. tools -->
					</div><!-- /.box-header -->
					<div class="box-body pad">


						<form method="POST" action="/admin/updatePost/update/<?php echo $post->id?>" enctype="multipart/form-data">

							<div class="form-group">
								<label>Название поста</label>
								<input type="text" class="form-control" name="title" value="<?php echo $post->title;?>">
							</div>

							<div class="form-group">
								<label>Дата</label>
								<input type="date"  name="date" value="<?php echo $post->date;?>">
								<br>
								<label>Автор</label>
								<input type="text" placeholder="Admin" name="about" <?php echo $post->about;?>>
							</div>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label>Категории</label>
								</div>
								<select class="custom-select" id="inputGroupSelect03" name="category">
									<?php foreach ($category as $key => $value):?>
										<option value="<?php echo $key?>"><?php echo $value?></option>
									<?php endforeach;?>
								</select>
							</div>

							<div class="form-group">
								<label>Описание</label>
								<textarea type="text" class="form-control" name="description"><?php echo $post->description;?></textarea>
							</div>

							<div class="form-group">
								<label>Картинка</label>
								<input type="file" class="form-control" name="img">
							</div>


							<textarea class="textarea" name="text" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
								<?php echo $post->text;?>
							</textarea>

							<button name="btn" type="submit" class="btn btn-info pull-right">Добавить</button>


							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- ./row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
