<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
<!--                    <img class="img-responsive" src="img/profile.png" alt="">-->
                    <div class="intro-text">                        
                        <span class="name">Elecciones 2017</span>
                        <hr class="star-light">
<!--                        <h3 class="fa fa-fw fa-minus"></h3>-->
                        <span class="skills">Toda la información y propuestas de los candidatos electorales en un solo sitio.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
    //$servername = "localhost:3306";
    //$username = "adminE17";
    $servername = "localhost";
    $username = "root";
    $password = "admin2017";
    $dbname = "elecciones2017pc";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM candidatos";
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
    <section class="success" id="about">
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
    $servername = "localhost";
    $username = "root";
    $password = "admin2017";
    $dbname = "elecciones2017pc";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM candidatos";
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
                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="col-lg-2">
                        <?php $rutaImagen = Yii::app()->baseUrl."/images/".$row['rutaimagen']; ?>
                        <img src="<?php echo $rutaImagen;?>" class="img-circle" alt="" style="width: 40%; height: 40%">
                    </div>
                <?php }?>    
            </div>
        </div>
    </section>
    
    <?php
        $conn->close();
    ?>