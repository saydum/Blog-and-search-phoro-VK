<?php $this->layout('template', ['title' => $post->title]);
/**
 *Генерирование вверхних сылок Главное/Посты/Как стать милионером
 */
include 'heaaderNavLink.php';
/**
 * Проверяет есть ли значение который хранит в себе пост
 * и перебирает возврашая название по ключю из массива category.php
 */
$arrCategoru = include '../config/category.php';

if (array_key_exists($post->category, $arrCategoru)) {
  foreach ($arrCategoru as $key => $value) {
    $category = $arrCategoru[$post->category];
  }
}


?>
<div class="container">
  <div class="row">
    <!-- Latest Posts -->
    <main class="post blog-post col-lg-8">
      <div class="container">
        <div class="post-single">
          <div class="post-thumbnail"><img src="../<?php echo $post->img?>" alt="..." class="img-fluid"></div>
          <div class="post-details">
            <div class="post-meta d-flex justify-content-between">
              <div class="category"><a href="#"><?php echo $category?></a></div>
            </div>
            <h1><?php echo $post->title;?><a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
            <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
              <div class="avatar"><img src="<?php __DIR__?>/img/ava.jpg" alt="..." class="img-fluid"></div>
              <div class="title"><span><?php echo $post->about;?></span></div></a>
              <div class="d-flex align-items-center flex-wrap">
                <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo date('d-m-Y', strtotime($post->date));?></div>
<!--                 <div class="views"><i class="fa fa-eye" aria-hidden="true"></i><?php echo $post->countViews?></div>
                <div class="comments meta-last"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo $post->countComments?></div> -->
              </div>
            </div>
            <div class="post-body">
              <p class="lead"><?php echo $post->text;?></p>
            </div>


                <div class="post-comments">
                  <div class="comment">
                    <!-- Put this script tag to the <head> of your page -->
                      <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>

                      <script type="text/javascript">
                        VK.init({apiId: 7645398, onlyWidgets: true});
                      </script>

                      <!-- Put this div tag to the place, where the Comments block will be -->
                      <div id="vk_comments"></div>
                      <script type="text/javascript">
                        VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
                      </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
          <!-- Widget [Search Bar Widget]-->
          <?php include 'bar.php'?>
        </div>
      </div>