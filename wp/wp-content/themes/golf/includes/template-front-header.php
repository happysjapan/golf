<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikumu Horikawa 公式サイト</title>
    <link rel="icon"
      type="svg"
      href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo golf_getCssAssets(); ?>">
    <!--
    <link rel="stylesheet" href="http://localhost:8888/HAPPYS/golf/src/css/app.css">
    -->
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

    <?php wp_head(); ?>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-80487222-1', 'auto');
      ga('send', 'pageview');
    </script>

  </head>
  <body>

    <!-- Header Section -->
    <header id="top_header" class="top_header fixed">
      <div class="row top_header--inner">
        <div class="column">

          <div class="row">
            <div class="logo--holder columns align-center small-12">
              <a href="<?php echo home_url(); ?>">
                <h1 id="logo" class="logo">
                  <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/top/logo.png" id="logo--image" class="logo--image" alt="堀川未来夢" width="325" height="46" /> -->
                  <p class="logo--text">堀川&nbsp;未来夢</p>
                  <strong class="logo--subline">
                    - MIKUMU HORIKAWA OFFICIAL WEBSITE -
                  </strong>
                </h1>
              </a>
            </div>
          </div>

          <div class="row">
            <div class="columns small-12">
              <?php get_template_part( 'includes/template', 'navigation' ); ?>
            </div>
          </div>

          <div class="nav--button--holder" data-responsive-toggle="nav" data-hide-for="medium">
            <a class="dark nav--button" data-toggle></a>
          </div>

        </div>
      </div>
    </header>
    <!--  / Header Section -->
