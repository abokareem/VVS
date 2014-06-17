<?php

/**
 * This is the model base class for the table "voucher_action".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VoucherAction".
 *
 * Columns in table "voucher_action" available as properties of the model,
 * followed by relations of table "voucher_action" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $create_date
 * @property string $deleted_at
 *
 * @property VoucherHistory[] $voucherHistories
 */
abstract class BaseVoucherAction extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'voucher_action';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'VoucherAction|VoucherActions', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max'=>255),
			array('deleted_at', 'safe'),
			array('deleted_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, description, create_date, deleted_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'voucherHistories' => array(self::HAS_MANY, 'VoucherHistory', 'action'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
			'create_date' => Yii::t('app', 'Create Date'),
			'deleted_at' => Yii::t('app', 'Deleted At'),
			'voucherHistories' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('deleted_at', $this->deleted_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}