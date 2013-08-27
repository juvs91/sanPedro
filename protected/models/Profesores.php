<?php

/**
 * This is the model class for table "profesores".
 *
 * The followings are the available columns in table 'profesores':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $titulo
 * @property string $seguro
 * @property integer $idRole
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Roles $idRole0
 */
class Profesores extends CActiveRecord
{    
	public $image;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profesores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profesores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellido, titulo, seguro, idRole, url', 'required'),
			array('id, idRole', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, titulo', 'length', 'max'=>25),
			array('seguro', 'length', 'max'=>50),
			array('url', 'length', 'max'=>100), 
			array('image ,url ', 'length', 'max'=>150), 
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>false, 'on'=>'update'),  

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, apellido, titulo, seguro, idRole, url', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idRole0' => array(self::BELONGS_TO, 'Roles', 'idRole'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'titulo' => 'Titulo',
			'seguro' => 'Seguro',
			'idRole' => 'Id Role',
			'url' => 'Url', 
			'image'=> 'Image',
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('seguro',$this->seguro,true);
		$criteria->compare('idRole',$this->idRole);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}