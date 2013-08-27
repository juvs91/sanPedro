<?php

/**
 * This is the model class for table "fotos".
 *
 * The followings are the available columns in table 'fotos':
 * @property integer $id
 * @property string $nombre
 * @property string $url
 * @property integer $idAlbum
 *
 * The followings are the available model relations:
 * @property Albums $idAlbum0
 */
class Fotos extends CActiveRecord
{          
	public $image;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fotos the static model class
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
		return 'fotos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, url, idAlbum', 'required'),
			array('id, idAlbum', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>25),
			array('url', 'length', 'max'=>100),   
			array('image ,url ', 'length', 'max'=>150), 
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>false, 'on'=>'update'), 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, url, idAlbum', 'safe', 'on'=>'search'),
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
			'idAlbum0' => array(self::BELONGS_TO, 'Albums', 'idAlbum'),
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
			'url' => 'Url',
			'idAlbum' => 'Id Album',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('idAlbum',$this->idAlbum);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}