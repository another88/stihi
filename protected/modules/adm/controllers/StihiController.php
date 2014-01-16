<?php

class StihiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $model = new Stihi;
        $poet = Poet::model()->findAll('enabled=:enabled', array(':enabled'=>1));
        $poets = CHtml::listData($poet,'id', 'name');
        
        if(isset($_POST['Stihi'])){
            $model->attributes = $_POST['Stihi'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }
        $this->render('create',array('model'=>$model,'poet'=>$poets,));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $poet = Poet::model()->findAll('enabled=:enabled', array(':enabled'=>1));
        $poets = CHtml::listData($poet,'id', 'name');
		if(isset($_POST['Stihi']))
		{
			$model->attributes=$_POST['Stihi'];
			if($model->save()){
                if(isset($_POST['Stihi']['tags']) && !empty($_POST['Stihi']['tags'])){
                    $tags = $_POST['Stihi']['tags'];
                    $criteria = new CDbCriteria;
                    $criteria->compare('stih_id', $model->id);
                    $criteria->addNotInCondition('tag_id',$tags);
                    StihTags::model()->deleteAll($criteria);
                    foreach ($tags as $key => $value) {
                        $exist_tag = StihTags::model()->count("stih_id=:stih_id AND tag_id=:tag_id ", array('tag_id'=>$value,'stih_id'=>$model->id));
                        if($value!=0 && !$exist_tag){
                            $tag = new StihTags();
                            $tag->stih_id = $model->id;
                            $tag->tag_id = $value;
                            $tag->save();
                        }
                    }
                }
                $this->redirect(array('view','id'=>$model->id));
            }
		}
        
		$this->render('update',array(
			'model'=>$model,'poet'=>$poets
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Stihi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Stihi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Stihi']))
			$model->attributes=$_GET['Stihi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Stihi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Stihi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Stihi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='stihi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
    public function beforeAction($action) {
            Yii::app()->getClientScript()->registerCoreScript('jquery');
            Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
            Yii::app()->bootstrap->register();
            $cs = Yii::app()->getClientScript();
            $cs->registerCssFile($cs->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css');
            return true;
    }
}
