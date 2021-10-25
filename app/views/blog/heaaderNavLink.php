        <?php
        if(isset($post->title)){
          $title = '/ ' . $post->title;
          $postName = '/ '.' <a href="/"> Посты </a>';
        } else {
          $title = '';
          $postName = '';
        }

        ?>
        <div style="margin-left: 122px;font-size: 14px;">
          <nav>
            <ul class="nav">
              <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i>
               Главное </a> </li>
              <li><?php echo $postName?></li>
              <li class="active"><?php echo $title; ?> </li>
            </ul>
          </nav>
        </div>