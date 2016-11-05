<!DOCTYPE html>
<html lang="es" class="no-js">
   <head>
        <meta charset="utf-8" />        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
            <?php                            
              $baseUrl = Yii::app()->theme->baseUrl; 
              $cs = Yii::app()->getClientScript();
              Yii::app()->clientScript->registerCoreScript('jquery');
            ?>
        
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/fonts/style.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/css/main.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/css/main-responsive.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/iCheck/skins/all.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/theme_light.css"  id="skin_color">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/css/print.css" media="print"/>
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->        
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/fullcalendar/fullcalendar/fullcalendar.css">
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/select2/select2.css">        
<!--        <link rel="stylesheet" href="<?php //echo $baseUrl;?>/plugins/datepicker/css/datepicker.css">-->
<!--        <link rel="stylesheet" href="<?php //echo $baseUrl;?>/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">-->
<!--        <link rel="stylesheet" href="<?php //echo $baseUrl;?>/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">-->
<!--        <link rel="stylesheet" href="<?php //echo $baseUrl;?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">-->
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
<!--        <link rel="stylesheet" href="<?php //echo $baseUrl;?>/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">-->
        <link rel="stylesheet" href="<?php echo $baseUrl;?>/plugins/summernote/build/summernote.css">
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <link rel="shortcut icon" href="favicon.ico" />
   </head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">        
        <div class="container">
            <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->                    
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/index"?>>
                            Jenny N2
                    </a>
                    <!-- end: LOGO -->
            </div>
            <div class="navbar-tools">
                <ul class="nav navbar-right">                                        
                    <?php           
                        if(!Yii::app()->user->isGuest)
                        {
                    ?>
                            <li class="current-user">
                                <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/logout"?>><i class="clip-user-3"></i>
                                        <span class="username"> Cerrar Sesion (<?php echo Yii::app()->user->name?>) </span>
                                </a>
                            </li>
                    <?php
                        }
                    ?>                         
                </ul>
            </div>           
        </div>
    </div>