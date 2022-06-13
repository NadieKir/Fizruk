<?php

use yii\helpers\Url;

$this->title = Yii::$app->name;

use app\assets\ServicesAsset;
use yii\helpers\Html;

ServicesAsset::register($this);
?>

<section class="all-subservices">
    <div class="container">

        <?php foreach ($allSubServices as $subservice) : ?>

            <div id="<?= $subservice->alias ?>" class="subservice-desc">
                <div class="subservice-full-desc">
                    <h2 class="subservice-full-desc-heading"><?= $subservice->service ?></h2>
                    <p class="subservice-full-desc-info"><?= $subservice->description ?></p>
                    <span><span class="green"><?= $subservice->price ?> р.</span> &nbsp;/&nbsp; 1 занятие</span>
                </div>
                <div class="subservice-image" style="background: url('/img/services/<?= $subservice->image ?>'); background-size: cover;"></div>
            </div>

        <?php endforeach; ?>

    </div>
</section>