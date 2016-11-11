<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
//
//$this->pageTitle=Yii::app()->name . ' - Contact Us';
//$this->breadcrumbs=array(
//	'Contact',
//);
?>

<br></br>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contacto</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array("class"=>"form-control","placeholder"=>$model->getAttributeLabel('name'), "required data-validation-required-message"=>"Ingrese su nombre, porfavor.")); ?>
		<?php echo $form->error($model,'name',array("class"=>"help-block text-danger")); ?>
            </div>
        </div>

	<div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array("class"=>"form-control","placeholder"=>$model->getAttributeLabel('email'), "required data-validation-required-message"=>"Ingrese su correo, porfavor.")); ?>
		<?php echo $form->error($model,'email',array("class"=>"help-block text-danger")); ?>
            </div>
	</div>

	<div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128,"class"=>"form-control","placeholder"=>$model->getAttributeLabel('subject'), "required data-validation-required-message"=>"Ingrese su asunto, porfavor.")); ?>
		<?php echo $form->error($model,'subject',array("class"=>"help-block text-danger")); ?>
            </div>
	</div>

	<div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50,"class"=>"form-control","placeholder"=>$model->getAttributeLabel('body'), "required data-validation-required-message"=>"Ingrese su mensaje, porfavor.")); ?>
		<?php echo $form->error($model,'body',array("class"=>"help-block text-danger")); ?>
            </div>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">		
                        <?php echo $form->labelEx($model,'verifyCode'); ?>
                        <?php echo $form->textField($model,'verifyCode',array("class"=>"form-control","placeholder"=>$model->getAttributeLabel('verifyCode'))); ?>
                        <?php echo $form->error($model,'verifyCode',array("class"=>"help-block text-danger")); ?>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12">	
                        <?php $this->widget('CCaptcha'); ?>
                    </div>
                </div>
                
                <div class="row control-group">
                    <div class="form-group col-xs-12">
                        Porfavor, ingrese las letras que se muestran en la imagen de abajo.
                        Las letras no son sensibles a la mayúsculas.
                    </div>            
		</div>  
	<?php endif; ?>
        <br>        
        <div class="row">
            <div class="form-group col-xs-12">
                <?php echo CHtml::submitButton('Enviar',array("class"=>"btn btn-success btn-lg")); ?>                
            </div>
        </div>
<?php $this->endWidget(); ?>

                </form>
            </div>
        </div>
    </div>
</section>