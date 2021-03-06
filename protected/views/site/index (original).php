<?php    
    $servername = "localhost:3306";
    /*$username = "adminE17";
    $password = "admin2017"
    $dbname = "elecciones2017pc";*/
    $username = "adminE17";
    $password = "admin2017"
    $dbname = "elecciones2017";

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
    <header style="background-image:url(<?php echo $rutaImagenHeader;?>) !important" >
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
                    <h3 class="fa fa-fw fa-minus"/>
                </div>
            </div>
            <div class="row">
                <?php //$modelCantidatosIndex = new Candidatos;?>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="col-sm-3 portfolio-item">
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
            $conn->close();
            ?>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about" style="background-color: #2c3e50!important">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Propuestas</h2>
                    <h3 class="fa fa-fw fa-minus"/>
                </div>
            </div>            
        </div>
    </section>

    <?php
    //$servername = "localhost:3306";
    //$username = "adminE17";
    $servername = "localhost:3306";
    $username = "adminE17";
    $password = "admin2017"
    $dbname = "elecciones2017";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM candidatos where estado = 'A' and partidopolitico is not null order by idcandidatos";
    $result = $conn->query($sql);

    //$conn->close();
    ?>
    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
<!--            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>-->
            <div class="row">
                <?php $firstTime = false; ?>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="col-lg-2 col-sm-3 col-xs-6">
                        <?php $rutaImagen = Yii::app()->baseUrl."/images/".$row['rutaimagen']; ?>
                        <img src="<?php echo $rutaImagen;?>" class="img-circle" alt="" style="width: 100%; height: 100%">
                        
                        <?php $sqlP = "select pro.idpropuestas, cat.idcategorias, cat.nombrecategoria, pro.descripcion
                        from elecciones2017.propuestas pro join elecciones2017.categorias cat on pro.idcategoria = cat.idcategorias
                            where pro.estado = 'A' and pro.idcandidato =".$row['idcandidatos']." and cat.estado = 'A' order by pro.idcandidato";
                          $resultP = $conn->query($sqlP);
                    ?>
                    <div class="row">
                        
                        <?php while($rowP = $resultP->fetch_assoc()) { ?>                           
                        
                            <div class="col-lg-12">
                                <?php if(!$firstTime) { ?> 
                                <label class="visible-lg"><?php echo $rowP['nombrecategoria'];?></label>
                                <label class="visible-md visible-sm visible-xs"><?php echo $rowP['nombrecategoria'];?></label>
                                <?php } else {?> <label class="visible-lg">&nbsp;</label> <label class="visible-md visible-sm visible-xs"><?php echo $rowP['nombrecategoria'];?></label> <?php } ?>
                            </div>
                            
                                <div class="col-lg-12" style="border-left: 4px solid #2c3e50;">                            
                                    <p style="font-size: 130%"><?php echo $rowP['descripcion'];?></p>
                                </div>
                        <?php }?>
                    </div>

                    </div>
                    <?php $firstTime = true; ?>
                <?php }?>
            </div>
            
            <?php /*
                $sqlCat = "SELECT * FROM categorias where estado = 'A' order by idcategorias";
                $resultCat = $conn->query($sqlCat);
            ?>

            <?php while($rowCat = $resultCat->fetch_assoc()) { ?>

                    <?php $sqlP = "select pro.idpropuestas, cat.idcategorias, cat.nombrecategoria, pro.descripcion
                        from elecciones2017pc.propuestas pro join elecciones2017pc.categorias cat on pro.idcategoria = cat.idcategorias
                            where pro.estado = 'A' and pro.idcategoria =".$rowCat['idcategorias']." and cat.estado = 'A' order by pro.idcandidato";
                          $resultP = $conn->query($sqlP);
                    ?>
                <div class="row">

                    <?php while($rowP = $resultP->fetch_assoc()) { ?>                    
                            <div class="col-lg-2" style="width: 14%">                            
                                <p style="font-size: 130%"><?php echo $rowP['descripcion'];?></p>
                            </div>
                    <?php }?>
                </div>
            <?php }*/?>
        </div>
    </section>
    
    <?php
        $conn->close();
    ?>