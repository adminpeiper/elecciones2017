<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
                $this->pageTitle = "Elecciones 2017 - Vota con conocimiento";
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
                            $servername = "localhost:3306";
                            $username = "adminE17";
						    $password = "admin2017"
						    $dbname = "elecciones2017";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "INSERT INTO correo (nombre, correo, asunto, mensaje, estado)
                            VALUES ('".$model->name."', '".$model->email."', '".$model->subject."', '".$model->body."', 'A')";

                            if (!$conn->query($sql)) {
                                throw $conn->error;
                            }

                            $conn->close();

                            /*$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                            $subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                            $headers="From: $name <{$model->email}>\r\n".
                                    "Reply-To: {$model->email}\r\n".
                                    "MIME-Version: 1.0\r\n".
                                    "Content-Type: text/plain; charset=UTF-8";

                            mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);*/
                            Yii::app()->user->setFlash('contact','Gracias por contactarse con nosotros. Le responderemos lo más rápido posible.');
                            //$this->refresh();
                            $model = new ContactForm;
			}
		}
		$this->render('contact',array('model'=>$model));
	}

        public function actionDisclaimer()
	{
            $this->pageTitle = "Elecciones 2017 - Importante";
            $this->render('disclaimer');
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        public function actionVotacion()
	{
            $votado = false;

            /*if(isset($_POST['g-recaptcha-response']))
            {*/
                if(!empty($_POST['g-recaptcha-response']))
                {
                    $secret = '6LdIIQwUAAAAAD0r-fb1u6l-q61yd7TgBQtNRej-';
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                    $responseData = json_decode($verifyResponse);
                    if($responseData->success){
                        if(isset($_POST['radio'])) {
                            $voto = !empty($_POST['radio']) ? 0 : $_POST['radio'];

                            $this->guardarVotacion($_POST['radio']);
                            $votado = true;
                        }
                    } else {
                        Yii::app()->user->setFlash('danger', '<p style="padding: 1% 0% 1% 1%"> Error con el reCAPTCHA. Recuerde seleccionarlo el reCAPTCHA. </p>');
                    }
                } /*else {
                    Yii::app()->user->setFlash('danger', '<p style="padding: 1% 0% 1% 1%"> Falta seleccionar el reCAPTCHA. </p>');
                }*/
            //}
            $this->pageTitle = "Elecciones 2017 - Votación";
            $this->render('votacion',array('votado'=> $votado));
	}

        public function guardarVotacion($idCandidato)
        {
            try
            {
                $servername = "localhost:3306";
                $username = "adminE17";
    $password = "admin2017"
    $dbname = "elecciones2017";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO votacion (idcandidato, estado)
                VALUES (".$idCandidato.", 'A')";

                if (!$conn->query($sql)) {
                    throw $conn->error;
                }

                $conn->close();
            } catch (Exception $ex) { throw $ex; }
        }

        public function actionLugarVotacion()
	{
            $this->pageTitle = "Elecciones 2017 - ¿Dónde voto?";
            $this->render('lugarVotacion');
	}
}
