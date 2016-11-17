        <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Peiper Code</h3>
                        <p>Guayaquil, Ecuador                        
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Visitanos</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/peipercode" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/peipercode" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>                            
                            <li>
                                <a href="http://www.peipercode.com" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-link"></i></a>
                            </li>                            
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Acerca de Peiper Code</h3>
                        <p>Grupo freelance que ofrece software de calidad y ágil.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Peiper Code <?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    
    <?php 
        $servername = "localhost:3306";
        $username = "root";
        //$servername = "localhost:3306";
        //$username = "root";
        $password = "admin2017";
        $dbname = "elecciones2017pc";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT * FROM candidatos where estado = 'A'";
        $result = $conn->query($sql);
    ?>
    
    <?php //foreach($modelCantidatos->findAll() as $model) {?>
    <?php while($model = $result->fetch_assoc()) { ?>
    
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $model['idcandidatos'];?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2><?php echo $model['nombrecandidatos'];?></h2> <br>                                
                                <?php $rutaImagen = Yii::app()->baseUrl."/images/".$model['rutaimagen']; ?>
                                <img src="<?php echo $rutaImagen; ?>" class="img-responsive img-centered" alt="">
                                <h4>Partido Político: &nbsp;</h4> <?php echo $model['partidopolitico'];?>
                                <h4>Redes Sociales</h4>
                                
                                    <ul class="list-inline">
                                        <?php if(!empty($model['usuariofacebook'])){?>
                                            <li>
                                                <a href="https://www.facebook.com/<?php echo $model['usuariofacebook'];?>" target="_blank" class="btn-social"><i class="fa fa-fw fa-facebook"></i></a>
                                            </li>
                                        <?php }?>
                                        <?php if(!empty($model['usuariotwitter'])){?>
                                            <li>
                                                <a href="https://twitter.com/<?php echo $model['usuariotwitter'];?>" target="_blank" class="btn-social"><i class="fa fa-fw fa-twitter"></i></a>
                                            </li>                            
                                        <?php }?>
                                        <?php if(!empty($model['paginaweb'])){?>
                                            <li>
                                                <a href="<?php echo $model['paginaweb'];?>" target="_blank" class="btn-social"><i class="fa fa-fw fa-link"></i></a>
                                            </li>                            
                                        <?php }?>
                                    </ul>
                                                          
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <?php }?>

<!-- jQuery -->
    <script src="<?php echo $baseUrl;?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl;?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo $baseUrl;?>/js/jqBootstrapValidation.js"></script>
    <script src="<?php echo $baseUrl;?>/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo $baseUrl;?>/js/freelancer.min.js"></script>

</body>

</html>