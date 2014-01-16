<?php

class SiteController extends Controller
{
    public $pageDescription;
    public $pageKeyWords;

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function init()
    {
        $this->layout = 'stih';
        Yii::app()->getClientScript()->registerCoreScript('jquery');
        Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.carouFredSel-6.2.1-packed.js');
        Yii::app()->bootstrap->register();
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
        return parent::init();
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = 'stih';

        $popular = Poet::model()->findAll(array('order' => 'views DESC'));
        $this->render('index', array('popular' => $popular,));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /*
     * Display poet page with lirycs
     */
    public function actionPoet($id)
    {
        if (!isset($id) || !is_numeric($id)) {
            $this->redirect("/");
        }
        $poet = Poet::model()->findByPk($id);
        $poet->saveCounters(array('views' => 1));
        $model = Stihi::model()->findAll('poet_id=:poet_id', array('poet_id' => $id));

        $this->render('poet', array('model' => $model, 'poet' => $poet));
    }

    public function actionPoets()
    {
        $model = Poet::model()->findAll();

        $this->render('poets', array('model' => $model));
    }

    public function actionStihi()
    {
        $dataProvider = new CActiveDataProvider('Stihi');
        $this->render('stihi', array('dataProvider' => $dataProvider));
    }

    public function actionStih($id)
    {
        if (!isset($id) || !is_numeric($id)) {
            $this->redirect("/");
        }
        $model = Stihi::model()->findByPk($id);
        $this->pageDescription = "Стих {$model->poet->name} - {$model->name}";
        $this->pageKeyWords = "Стихи, {$model->poet->name}, {$model->name}";
        $this->render('stih', array('model' => $model));
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function beforeAction($action)
    {

        return true;
    }

    /**
     * render meta tags before render page
     * @param $view
     * @return bool
     */
    public function beforeRender($view)
    {
        if (!empty($this->pageDescription)) {
            Yii::app()->clientScript->registerMetaTag($this->pageDescription, 'description', null, array('id' => 'meta_description'), 'meta_description');
        }
        if (!empty($this->pageKeyWords)) {
            Yii::app()->clientScript->registerMetaTag($this->pageKeyWords, 'keywords', null, array('id' => 'keywords'), 'meta_keywords');
        }

        return true;
    }
}