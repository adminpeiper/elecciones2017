<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
<!--            <a class="navbar-brand" href="#page-top">Elecciones 2017</a>-->
            <a class="navbar-brand" href=<?php echo Yii::app()->request->baseUrl."/index.php";?>>
                    Elecciones 2017
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
<!--                <li class="page-scroll">
                    <a href="#portfolio">Portfolio</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>-->
                <li>
                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php";?>>Inicio</a>
                </li>
                <li>
                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/votacion";?>>Votación</a>
                </li>
                <li>
                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/lugarVotacion";?>>¿Dónde voto?</a>
                </li>
                <li>
                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/disclaimer";?>>Importante</a>
                </li>
                <li>
                    <a href=<?php echo Yii::app()->request->baseUrl."/index.php?r=site/contact";?>>Contacto</a>
                </li>                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>