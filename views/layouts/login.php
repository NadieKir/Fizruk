<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/icon.svg">
    <?php $this->registerCsrfMetaTags() ?>
    <title> <?= Html::encode($this->title) ?> </title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <header class="login-header">
        <a href="<?= Url::to(['main/index']) ?>"><?= Html::img('@web/img/logo.svg', ['alt' => 'logo', 'height' => '40px']) ?></a>
    </header>


    <?= $content ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>