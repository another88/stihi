<?php

/**
 * This is the model class for table "stihi".
 *
 * The followings are the available columns in table 'stihi':
 * @property integer $id
 * @property integer $poet_id
 * @property string $name
 * @property string $date
 * @property string $text
 * @property string $tags
 * @property integer $views
 * @property string $time
 */
class Stihi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Stihi the static model class
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
		return 'stihi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('poet_id, name,text', 'required'),
			array('poet_id, views', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, poet_id, name, date, text, tags, views, time', 'safe', 'on'=>'search'),
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
            'poet'=>array(self::BELONGS_TO, 'Poet', 'poet_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'poet_id' => 'Поэт',
			'name' => 'Название',
			'date' => 'Дата написания(не обезательно)',
			'text' => 'Текст',
			'tags' => 'Теги (выбирать через ctrl)',
			'views' => 'Просмотры',
			'time' => 'Дата публикации',
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
		$criteria->compare('poet_id',$this->poet_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}