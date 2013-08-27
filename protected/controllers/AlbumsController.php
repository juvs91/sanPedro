<?php

class AlbumsController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
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
		//entra al try para atrapar cualquier excepcion        
		try {
		$model=new Albums;
        
		$data=null;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Albums']))
		{   
		  $model->attributes=$_POST['Albums'];  
		  $model->image=CUploadedFile::getInstance($model,'image');   
		  $model->url='protected/fotos/albums/'.$model->nombre."/".$model->image->name;
		  
		
		  if(file_exists("protected/fotos/albums/".$model->nombre))                    
		      $this->errorDisplay("warning");
		 
		  
		if ($model->save()) {   
		  	$data=$model->image;    
		
		  	//crea el directorio del album   
		    mkdir("protected/fotos/albums/".$model->nombre);
		
		  	//se guarda la imagen en el servidor 
		  	$model->image->saveAs('protected/fotos/albums/'.$model->nombre."/".$model->image);
	  	  	$this->redirect(array('view','id'=>$model->id));
		  }
		   
		}

		$this->render('create',array(
			'model'=>$model, 
			"data"=>$data,
		));    
		 } catch (Exception $e) {
   		   $this->errorDisplay($e);
		 }
	} 

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Albums']))
		{
			$model->attributes=$_POST['Albums'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{                                    
		//borran todas las fotografias del album    
	    $model = Albums::model()->findByPk($id);//es el objeto modelo que tiene todos los atributos de un album en especifico , el cual es el que se borrara


		$dir = "protected/fotos/albums/".$model->nombre;//la direccion del album a borrar
		 
	    //funcion que borra todos los archivos dentro de un directorio o carpetas y luego borra el directorio
	 	$this->eliminarDir($dir);
		          
		//se borran de la base de datos todas las fotos del album 
		fotos::model()->deleteAll("idAlbum = ?", $id);
		
		
		//se borran de la base de datos el album  
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
		$dataProvider=Albums::model()->findAll();
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Albums('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Albums']))
			$model->attributes=$_GET['Albums'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Albums the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Albums::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Albums $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='albums-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}     
	
	/**
	 *Perform de handler exception for de creating album and the delete album  
	 *
	*/      
   	private function errorDisplay($e)
   	{                             
	   if ($e == "warning") {
	   	# code...         
		   throw new CHttpException(500, 'unos changitos muy monos arreglaran el problema , por favor sea pasiente: cannot create the file'); 
	   } else if ($e == "warning2") {
	   	   throw new CHttpException(500, 'unos changitos muy monos arreglaran el problema , por favor sea pasiente: no se pudo borrar'); 
	   } else if ($e == "warning3") {
	   		throw new CHttpException(500, 'unos changitos muy monos arreglaran el problema , por favor sea pasiente: no se encontro ningun archivo'); 
	   }
	
		else {
	   	   throw new CHttpException(500, 'unos changitos muy monos arreglaran el problema , por favor sea pasiente: '.$e->getMessage());
	   	
	   }   		
   	}     

	private function eliminarDir($dir)
	{
    	foreach(glob($dir . "/*") as $arch){
	        	
        	if (is_dir($arch))
        	{
        		eliminarDir($arch);
        	}else{
        		unlink($arch);
        	}
    	}
    	
    	rmdir($dir);
	}
	
	
}
