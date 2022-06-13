<?php

use yii\helpers\Url;

$this->title = Yii::$app->name;

use app\assets\ServicesAsset;
use yii\helpers\Html;

ServicesAsset::register($this);
?>


<?php
$currServiceType = Yii::$app->request->get('id');
?>

<section class="all-services-nav">
    <div class="container">
        <?php foreach ($allServiceTypes as $serviceType) :
            if ($serviceType->alias == $currServiceType) $allCurrServiceTypeInfo = $serviceType;
        ?>

            <a href="<?= Url::to(['services/index', 'id' => $serviceType->alias]) ?>"><span class="service-nav <?php if ($currServiceType == $serviceType->alias) echo 'active' ?>"><?= $serviceType->service_type ?></span></a>

        <?php endforeach; ?>

    </div>
</section>

<?php
$serviceTypeDesc = $allCurrServiceTypeInfo->description;
$serviceTypeDescArr = preg_split('/\r\n/', $serviceTypeDesc);


?>

<section class="service-desc">
    <div class="service-info-wrapper">
        <div class="service-infos">
            <div class="service-header-arrow" src="img/long-arrow.svg" alt=""></div>
            <div class="service-info">
                <h1 class="service-info-heading"><?= $allCurrServiceTypeInfo->offer ?></h1>
                <div class="service-info-desc">

                    <?php foreach ($serviceTypeDescArr as $serviceTypeDesc) : ?>

                        <p><?= $serviceTypeDesc ?></p>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="subservices-wrapper" style="background: url('/img/services/<?= $allCurrServiceTypeInfo->photo ?>')">
        <div class="subservices">

            <?php foreach ($allSubServices as $subService) : ?>

                <a class="subservice <?php if ($currServiceType == 'gym') echo 'isGym' ?>" href="<?= Url::to(["services/index", 'id' => $allCurrServiceTypeInfo->alias, '#' => $subService->alias]) ?>"><?= $subService->service ?></a>

            <?php endforeach; ?>

        </div>
    </div>
</section>