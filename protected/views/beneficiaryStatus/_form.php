<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'beneficiary-status-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<label><?php echo GxHtml::encode($model->getRelationLabel('beneficiaries')); ?></label>
		<?php echo $form->checkBoxList($model, 'beneficiaries', GxHtml::encodeEx(GxHtml::listDataEx(Beneficiary::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->