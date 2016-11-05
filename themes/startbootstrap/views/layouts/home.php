<!DOCTYPE html>
<html lang="en" class="no-js">	
	<head>
		<title>Jenny Web - Inicio de Sesión</title>		
		<meta charset="utf-8" />		
                 <?php
                    $baseUrl = Yii::app()->theme->baseUrl; 
                    $cs = Yii::app()->getClientScript();
                    Yii::app()->clientScript->registerCoreScript('jquery');
                ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
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
	</head>	
        <div style=" float:center;">
            <?php echo $content; ?>
        </div>
</html>