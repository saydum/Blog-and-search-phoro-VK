<?php
$arrCategoru = include '../config/category.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bootstrap Blog - B4 Template by Bootstrap Temple</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php __DIR__?>/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom icon font-->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google fonts - Open Sans-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
  <!-- Fancybox-->
  <link rel="stylesheet" href="<?php __DIR__?>/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?php __DIR__?>/css/style.default.css" id="theme-stylesheet">

  <!-- Favicon-->
  <link rel="shortcut icon" href="<?php __DIR__?>/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
         (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
         (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

         ym(68951998, "init", {
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true
        });
      </script>
      <noscript><div><img src="https://mc.yandex.ru/watch/68951998" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
      <!-- /Yandex.Metrika counter -->
    </head>
    <body>
      <header class="header">
        <!-- Main Navbar-->
        <nav class="navbar navbar-expand-lg">
          <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
              <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>
              <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                  <form action="/posts/serarch/">
                    <div class="form-group">
                      <input type="search" name="search" id="search" placeholder="Ведите текст для поиска">
                      <a href="/posts/serarch/" class="submit"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
              <!-- Navbar Brand --><a href="/" class="navbar-brand">Ethical hacking</a>
              <!-- Toggle Button-->
              <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/" class="nav-link ">Главное</a>
                </li>


                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Категории
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($arrCategoru as $key => $value):?>
                     <a class="dropdown-item" href="/posts/serarch/<?php echo $key?>" class="tag"><?php echo $value?></a>
                   <?php endforeach;?>

                 </div>
               </li>
               <li class="nav-item"><a href="/program" class="nav-link ">Программы</a>
               </li>

               <li class="nav-item"><a href="/contacts" class="nav-link ">Контакты</a>
               </ul>

               <div class="navbar-text"><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i>
               </a></div>
               <!--       <ul class="langs navbar-text"><a href="#" class="active">EN</a><span>           </span><a href="#">ES</a></ul> -->
             </div>
           </div>
         </nav>
       </header>




       <?=$this->section('content')?>

       <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="logo">
                <h6 class="text-white">Ethical hacking</h6>
              </div>
              <div class="contact-details">
                <p>По вопросам</p>
                <p>Email: <a href="mailto:ethical.hacking.blog1@gmail.com">ethical.hacking.blog1@gmail.com</a></p>
                <p>Мы в соц сетях</p>
                <ul class="social-menu">
                  <li class="list-inline-item"><a class="nav-link active" href="https://www.youtube.com/channel/UCGgou2mPkfTyv9SULB2nckg?view_as=subscriber"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                  <li class="list-inline-item"><a class="nav-link" href="https://vk.com/ethical__hacking"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                  <li class="list-inline-item"><a class="nav-link" href="https://www.instagram.com/sysadmin0505/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md">
              <div class="menus d-flex">
                <ul class="list-unstyled">
                  <li> <a href="#">Мой акаунт</a></li>
                  <li> <a href="#">Как стать автором ?</a></li>
                  <li> <a href="/politika">Политика конфиденциальности</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-md-6 ">
                <p>Ethical hacking <a href="/" class="text-white"> Блог обо всем по немногу</a></p>
              </div>
              <div class="col-md-6 text-right">
                <p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrapious</a>
                  <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- JavaScript files-->

      <script src="<?php __DIR__?>/vendor/jquery/jquery.min.js"></script>
      <script src="<?php __DIR__?>/vendor/popper.js/umd/popper.min.js"> </script>
      <script src="<?php __DIR__?>/vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php __DIR__?>/vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="<?php __DIR__?>/vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
      <script src="<?php __DIR__?>/js/front.js"></script>
    </body>
    </html>