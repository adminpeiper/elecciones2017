<!DOCTYPE html>
<html lang="en">

<head>

    <?php $rutaImagenHeader = Yii::app()->baseUrl."/images/elecciones2017card.png"; ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Por un voto inteligente, infórmate.">
    <meta name="author" content="">
    <meta name="image" content=<?php echo $rutaImagenHeader;?>>

    <meta property="og:site_name"     content="Elecciones 2017" />
    <meta property="og:image"         content= <?php echo $rutaImagenHeader;?> />
    <meta property="og:description"   content="Por un voto inteligente, infórmate." />
    <meta property="og:url"           content="http://elecciones2017.peipercode.com" />
    <meta property="og:title"         content="Elecciones 2017" />
    <meta property="og:type"          content="website" />

    <meta name="twitter:url"           content="http://elecciones2017.peipercode.com" />
    <meta name="twitter:site"          content="@peipercode" />
    <meta name="twitter:creator"       content="@peipercode" />
    <meta name="twitter:image:src"     content= <?php echo $rutaImagenHeader;?> />
    <meta name="twitter:card"          content="summary" />
    <meta name="twitter:title"         content="Elecciones 2017" />
    <meta name="twitter:description"   content="Por un voto inteligente, infórmate." />

    <title><?php echo CHtml::encode($this->pageTitle);?></title>
    <?php
      $baseUrl = Yii::app()->theme->baseUrl;
      $cs = Yii::app()->getClientScript();
      Yii::app()->clientScript->registerCoreScript('jquery');
      date_default_timezone_set('America/Bogota');
    ?>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $baseUrl;?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo $baseUrl;?>/css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $baseUrl;?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</head>

<body id="page-top" class="index">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
