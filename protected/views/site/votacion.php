<style type="text/css">

    body{
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
    }

    .page {
        margin: 40px;
    }

    h1{
        margin: 40px 0 60px 0;
    }

    .dark-area {
        background-color: #666;
        padding: 40px;
        margin: 0 -40px 20px -40px;
        clear: both;
    }

    .clearfix:before,.clearfix:after {content: " "; display: table;}
    .clearfix:after {clear: both;}
    .clearfix {*zoom: 1;}

</style>

<link rel="stylesheet" href="css/circle/css/circle.css">

<br></br>
<section id="votacion">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Votación</h2>                
                <h3 class="fa fa-fw fa-minus"/>
            </div>            
        </div>
        <div class="row">         
            <div id="info" class="alert-warning">
                <p style="padding: 1% 0% 0% 1%">Los resultados presentados a continuación son datos de las votaciones hechos anteriormente por personas que han
                visitado nuesta página, no están ligados de ninguna forma con la CNE y/o encuentas de otras empresas.</p>
                <p style="padding: 1% 0% 1% 1%">Al momento de votar <b>no guardamos</b> tu número de telefóno, correo, dirección IP o ningún otro tipo de información, 
                es totalmente anónimo.</p>
            </div>

            <br>
            
            <?php
                //$servername = "localhost:3306";
                //$username = "adminE17";
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "elecciones2017pc";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
            ?>
            
            <?php
                $sqlC = "SELECT c.idcandidatos, c.nombrecandidatos,
                (select count(idcandidato) from votacion where idcandidato = c.idcandidatos and estado = 'A') as 'numeroVotos'
                FROM candidatos c 
                WHERE c.estado = 'A'";
                $resultC = $conn->query($sqlC);
            ?>

            <?php $totalVotos = 0;
                while($rowC = $resultC->fetch_assoc()) { 
                $totalVotos+= $rowC['numeroVotos'];
            }?>
            
            <?php if($votado) {?>

                <div class="col-lg-12"> 
                    <div id="votado" class="alert-success">
                        <p style="padding: 1% 0% 0% 1%">Gracias por votar, por favor no te olvides de compartir.</p>
                        <h3 style="padding: 0% 0% 1% 1%">“Un pueblo que lee es más libre y más difícil de engañar." - José Luis Corral </h3>
                    </div>
                </div>
                
                <div class="col-lg-1"> 
                    <a class="twitter-share-button" href="https://twitter.com/share" data-size="large"
                    data-text="Yo voto con conocimiento" data-url="http://elecciones2017.peipercode.com"
                    data-hashtags="VotoInteligente" data-via="peipercode"> Tweet </a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

                <div class="col-lg-1"> 
                    <div class="fb-share-button" data-href="http://elecciones2017.peipercode.com" data-layout="button_count" data-mobile-iframe="true" data-size="large"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Felecciones2017.peipercode.com%2F&amp;src=sdkpreparse">Compartir</a></div>
                </div>

                <br>
                
                <div class="col-lg-12">
                    <?php $resultC = $conn->query($sqlC);
                        while($rowCD = $resultC->fetch_assoc()) { 
                            $porcentajeVoto = ($rowCD['numeroVotos']/$totalVotos) * 100;
                            $porcentajeVoto = number_format($porcentajeVoto,0,'','');
                    ?>

                        <div class="col-lg-3 col-sm-3 col-xs-6">
                            <h5><?php echo $rowCD['nombrecandidatos'];?></h5>
                            <div class="c100 p<?php echo $porcentajeVoto?>">                            
                                <span><?php echo $porcentajeVoto.'%'; ?></span>                        
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>                    
                        </div>

                    <?php } ?>
                </div>
            <?php } ?>
            
            <?php if(!$votado) {?>
                <div class="col-lg-12">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'votacion-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                            ),
                    )); ?>
                        <?php $sql = "SELECT * FROM candidatos where estado ='A'";
                              $result = $conn->query($sql);                                
                        ?>

                        <?php while($row = $result->fetch_assoc()) { ?>

                            <div class="row control-group">
                                <div class="form-group col-xs-12">
                                    <input type="radio" value="<?php echo $row['idcandidatos']?>" name="radio">
                                    <span><?php echo $row['nombrecandidatos'];?></span>
                                </div>
                            </div>

                        <?php } ?>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <?php echo CHtml::submitButton('Votar',array("submit"=>array("site/Votacion"),"class"=>"btn btn-success btn-lg")); ?>                                                    
                            </div>
                        </div>
                    <?php $this->endWidget(); ?>
                </div>
            <?php } ?>
            
            <?php $conn->close(); ?>
        </div>
    </div>
</section>