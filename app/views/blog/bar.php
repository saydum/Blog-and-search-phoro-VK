        <?php $arrCategoru = include '../config/category.php';?>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Поиск по сайту</h3>
            </header>
            <form action="/posts/serarch/" class="search-form" method="POST">
              <div class="form-group">
                <input type="search" placeholder="Ведите текст" name="search">
                <button type="submit" class="submit" name="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </form>
          </div>
          <a href=""></a>
          <!-- Widget [Latest Posts Widget]        -->
          <div class="widget latest-posts">
            <header>
              <h3 class="h6">Популярные</h3>
            </header>
            <?php foreach ($posts as $post):?>
              <div class="blog-posts"><a href="/post/<?php echo $post->id?>">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="/<?php echo $post->img?>" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php echo $post->title; ?></strong>
                    <div class="d-flex align-items-center">
<!--                       <div class="views"><i class="fa fa-eye" aria-hidden="true"></i><?php echo $post->countViews?></div>
                      <div class="comments meta-last"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo $post->countComments?></div> -->
                    </div>
                  </div>
                </div>
              </a>
            <?php endforeach;?>
          </div>
        </div>
        <!-- Форма подписки-->
        <div class="widget search">
          <header>
            <h3 class="h6">Подписка на новости</h3>
          </header>
          <form action="" method="post" class="search-form">
            <div class="form-group">
              <input type="email" name="email" placeholder="Ведите свой Email">
              <button type="submit" class="submit" name="btn"><i class="fa fa-envelope-o" aria-hidden="true"></i>
              </button>
            </div>
          </form>
        </div>
        <!-- Widget [Tags Cloud Widget]-->
        <div class="widget tags">
          <header>
            <h3 class="h6">Теги</h3>
          </header>
          <ul class="list-inline">
            <?php foreach ($arrCategoru as $key => $value):?>
              <li class="list-inline-item"><a href="/posts/serarch/<?php echo $key?>" class="tag">#<?php echo $value?></a></li>
            <?php endforeach;?>
          </ul>
        </div>
      </aside>