<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
    
    public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
                'roles'=>array('admin'),
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}