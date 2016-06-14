<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chiiki-kouken</title>
    <link rel="icon"
      type="svg"
      href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <!--
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo chiiki_kouken_getCssAssets(); ?>">
    -->
    <link rel="stylesheet" href="http://localhost:8888/chiiki-kouken/src/css/app.css">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic">

    <?php wp_head(); ?>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-78380701-1', 'auto');
      ga('send', 'pageview');
    </script>

  </head>
  <body>

    <?php include_once('svg-sprites.php'); ?>

    <header class="header">


      <?php get_template_part( 'includes/template', 'navigation' ); ?>
    </header>

    <div class="breadcrumbs--holder row">
      <div class="columns">
        <?php //custom_breadcrumbs(); ?>
      </div>
    </div>
