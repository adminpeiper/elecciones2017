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
                <?php $modelCantidatosIndex = new Candidatos;?>
                <?php foreach($modelCantidatosIndex->findAll() as $modelIndex) {?>
                    <div class="col-sm-3 portfolio-item">
                        <a href="#portfolioModal<?php echo $modelIndex->idcandidatos;?>" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <?php $rutaImagen = Yii::app()->baseUrl."/images/".$modelIndex->rutaimagen; ?>
                            <img src="<?php echo $rutaImagen;?>" class="img-responsive" alt="">
                            <h3><?php echo $modelIndex->nombrecandidatos;?></h3>
                        </a>
                    </div>
                <?php }?>                
            </div>
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

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>