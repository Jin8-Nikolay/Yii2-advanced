<?php

use common\components\MenuCategoryBuilder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = '' . Yii::t('frontend', 'Процес оформленния') . '';
$this->params['flag'] = true;
$this->params['breadcrumbs'][] = $this->title;
$this->params['main_category'] = true;
?>
<?php $form = ActiveForm::begin(); ?>
    <form action="#" method="post">
        <section id="checkout-page">
            <div class="container">
                <div class="col-xs-12 no-margin">
                    <div class="billing-address">
                        <h2 class="border h1"><?php echo Yii::t('frontend', 'Оформление') ?></h2>

                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label><?php echo Yii::t('frontend', 'Имя') ?></label>
                                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'value' => $user->name, 'class' => 'le-input'])->label(false) ?>
                            </div>
                        </div>
                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label><?php echo Yii::t('frontend', 'Фамилия') ?></label>
                                <?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'value' => $user->surname, 'class' => 'le-input'])->label(false) ?>
                            </div>
                        </div>
                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label><?php echo Yii::t('frontend', 'отчество') ?></label>
                                <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true, 'value' => $user->patronymic, 'class' => 'le-input'])->label(false) ?>
                            </div>
                        </div>
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label><?php echo Yii::t('frontend', 'Email') ?></label>
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => $user->email, 'class' => 'le-input'])->label(false) ?>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label><?php echo Yii::t('frontend', 'Телефон') ?></label>
                                <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'value' => $user->phone, 'class' => 'le-input'])->label(false) ?>
                            </div>
                        </div>

                    </div>
                    <section id="your-order">
                        <h2 class="border h1"><?php echo Yii::t('frontend', 'Ваш заказ') ?></h2>

                        <?php if (count($productList) > 0): ?>
                            <?php foreach ($productList as $product): ?>
                                <div class="row no-margin order-item">
                                    <div class="col-xs-12 col-sm-1 no-margin">
                                        <a href="<?php echo Url::toRoute(['/cart/delete', 'id' => $product->id]) ?>"
                                           class="qty"><?php echo $productInCart[$product->id] ?> x</a>
                                    </div>

                                    <div class="col-xs-12 col-sm-9 ">
                                        <div class="title"><a href="#"><?php echo $product->header ?></a></div>
                                        <div class="brand"><?php echo $product->meta_description ?></div>
                                    </div>

                                    <div class="col-xs-12 col-sm-2 no-margin">
                                        <div class="price">$<?php if (isset($product->discount_id)) {
                                                echo $product->price - $product->price * $product->discount->value;
                                            } else {
                                                echo $product->price;
                                            } ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </section>
                    <div id="total-area" class="row no-margin">
                        <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                            <div id="subtotal-holder">
                                <ul class="tabled-data inverse-bold no-border">
                                    <li>
                                        <label><?php echo Yii::t('frontend', 'Доставка') ?></label>
                                        <div class="value">
                                            <div class="radio-group">
                                                <?= $form->field($model, 'delivery_id')->radioList(ArrayHelper::map($deliveryList, 'id', 'name2'), [
                                                    'item' => function ($index, $label, $name, $checked, $value) {
                                                        $items = explode('-', $label);
                                                        $return = '<input class="le-radio" type="radio" name="Order[delivery_id]" value="' . $value . '">';
                                                        $return .= '<div class="radio-label">' . ucwords($items[0]) . '<br><span class="bold">$' . $items[1] . '</span></div><br>';
                                                        return $return;
                                                    }
                                                ])->label(false) ?>
                                                <!--                                                --><? //= $form->field($model, 'delivery_id')->radioList(ArrayHelper::map($deliveryList, 'id', 'name'))->label(false) ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul id="total-field" class="tabled-data inverse-bold ">
                                    <li>
                                        <label><?php echo Yii::t('frontend', 'к оплате') ?></label>
                                        <div class="value">$<?php echo $total ?></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="payment-method-options">

                        <?= $form->field($model, 'payment_id')->radioList(ArrayHelper::map($paymentList, 'id', 'name2'), [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $items = explode('-', $label);
                                $return = '<div class="payment-method-option">';
                                $return .= '<input class="le-radio" type="radio" name="Order[payment_id]" value="' . $value . '">';
                                $return .= '<div class="radio-label bold">' . ($items[0]) . '<br><p>' . $items[1] . '</p></div><br>';
                                $return .= '</div>';
                                return $return;
                            }
                        ])->label(false) ?>

                    </div>
                    <div class="place-order-button">
                        <?php echo Html::submitButton(' ' . Yii::t('frontend', 'Оформить') . ' ', ['class' => 'le-button big']); ?>
                    </div>
                </div>
            </div>
        </section>
    </form>
<?php ActiveForm::end(); ?>