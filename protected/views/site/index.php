<?php
    $servername = "localhost:3306";
    $username = "adminE17";
    $password = "admin2017";
    $dbname = "elecciones2017";
    /*$username = "adminE17";
    $password = "admin2017";
    $dbname = "elecciones2017";*/

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<?php
    $idConfiguracion = rand(1, 4);
    $sqlHeader = "SELECT * FROM elecciones2017.configuracion WHERE idconfiguracion = ".$idConfiguracion;
    $resultHeader = $conn->query($sqlHeader);
    while($rowHeader = $resultHeader->fetch_assoc()) {
        $rutaImagenHeader = Yii::app()->baseUrl."/images/".$rowHeader['nombreImagen'];
    }
?>
<!-- Header -->
    <header style="background-image:url(<?php echo $rutaImagenHeader;?>) !important; height: auto;" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
<!--                    <img class="img-responsive" src="img/profile.png" alt="">-->
                    <div class="intro-text">
                        <span class="name">Elecciones 2017</span>

<!--                        <h3 class="fa fa-fw fa-minus"></h3>-->
                        <span class="skills">Toda la información y propuestas de los candidatos electorales en un solo sitio.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php

    $sql = "SELECT * FROM candidatos where estado = 'A' and partidopolitico is not null order by idcandidatos";
    $result = $conn->query($sql);

    //$conn->close();
    ?>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Candidatos</h2>
                    <h3>(Puedes descargar el documento en pdf de las propuestas de los candidatos.)</h3>
                    <h3 class="fa fa-fw fa-minus"/>
                </div>
            </div>
            <div class="row">
                <?php //$modelCantidatosIndex = new Candidatos;?>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="col-sm-3 portfolio-item" align="center">
                        <a href="#portfolioModal<?php echo $row['idcandidatos'];?>" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <?php $rutaImagen = Yii::app()->baseUrl."/images/".$row['rutaimagen']; ?>
                            <img src="<?php echo $rutaImagen;?>" class="img-responsive" alt="">
                            <h3><?php echo $row['nombrecandidatos'];?></h3>
                        </a>
                    </div>
                <?php }?>
            </div>
            <?php
            //$conn->close();
            ?>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about" style="background-color: #2c3e50!important">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Propuestas</h2>
                    <h3>Selecciona una opción que desees ver.</h3>
                    <h3 class="fa fa-fw fa-minus"/>
                </div>
            </div>
        </div>
    </section>

    <?php
    //$servername = "localhost:3306";
    //$username = "adminE17";
    /*$servername = "localhost:3306";
    $username = "adminE17";
    $password = "admin2017"
    $dbname = "elecciones2017";*/

    // Create connection
    //$conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    /*if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/

    $sql = "SELECT * FROM categorias where estado = 'A' order by idcategorias";
    $result = $conn->query($sql);

    //$conn->close();
    ?>

    <!-- Contact Section -->
    <section id="portfolio">
        <div class="container">
<!--            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>-->
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" align="center">

                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="col-sm-5 portfolio-item" align="center">
                        <a href="#portfolioModalCategoria<?php echo $row['idcategorias'];?>" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <?php $rutaImagenCat = Yii::app()->baseUrl."/images/".$row['imagencat']; ?>
                            <img src="<?php echo $rutaImagenCat;?>" class="img-responsive" alt="" style="width: 130px; height: 130px">
                            <h3><?php echo $row['nombrecategoria'];?></h3>
                        </a>
                    </div>
                <?php }?>

              </div>

                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                  <a class="twitter-timeline" data-height="700" href="https://twitter.com/peipercode/lists/candidatos-presidenciales">Una lista de Twitter por PeiperCode</a>
                </div>
            </div>
        </div>
    </section>

    <section class="success" id="redesSociales" style="background-color: #2c3e50!important">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Los candidatos en las Redes Sociales</h2>
                    <h3 class="fa fa-fw fa-minus"/>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio">
        <div class="container">
            <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                      <ul class="nav nav-tabs">
                        <?php
                          $sql = "SELECT * FROM candidatos where estado = 'A' and partidopolitico is not null order by idcandidatos";
                          $result = $conn->query($sql);
                          $firstLoop = false;
                        ?>

                        <?php while($row = $result->fetch_assoc()) { ?>
                            <?php if(!$firstLoop) {?>
                                <li class="active"><a data-toggle="tab" href="#tabCandidato<?php echo $row['idcandidatos'];?>"><?php echo $row['nombrecandidatos'];?></a></li>
                                <?php $firstLoop = true;?>
                            <?php } else {?>
                                <li><a data-toggle="tab" href="#tabCandidato<?php echo $row['idcandidatos'];?>"><?php echo $row['nombrecandidatos'];?></a></li>
                            <?php } ?>
                        <?php }?>
                      </ul>

                      <?php
                        $sql = "SELECT * FROM candidatos where estado = 'A' and partidopolitico is not null order by idcandidatos";
                        $result = $conn->query($sql);
                      ?>

                        <?php $firstLoop = false; ?>

                      <div class="tab-content">
                        </br>
                        <?php while($row = $result->fetch_assoc()) { ?>
                        <?php if(!$firstLoop) {?>
                          <div id="tabCandidato<?php echo $row['idcandidatos'];?>" class="tab-pane fade in active">
                          <?php $firstLoop = true; ?>
                        <?php } else {?>
                          <div id="tabCandidato<?php echo $row['idcandidatos'];?>" class="tab-pane fade">
                        <?php } ?>
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" align="center">
                                <div class="fb-page" data-href="https://www.facebook.com/<?php echo $row['usuariofacebook'];?>/" data-tabs="timeline" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                  <blockquote cite="https://www.facebook.com/<?php echo $row['usuariofacebook'];?>/" class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/<?php echo $row['usuariofacebook'];?>/"><?php echo $row['nombrecandidatos'];?></a>
                                  </blockquote>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" align="center">
                                <a class="twitter-timeline" data-lang="es" data-height="700" href="https://twitter.com/<?php echo $row['usuariotwitter'];?>">Tweets por <?php echo $row['nombrecandidatos'];?></a>
                              </div>
                            </div>
                          </div>

                        <?php }?>
                      </div>

                    </div>
            </div>
        </div>
    </section>

    <?php
        $conn->close();
    ?>
