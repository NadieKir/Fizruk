<?php

namespace app\controllers;

use app\models\Card;
use app\models\Trainer;
use app\models\TrainerService;
use yii\web\Controller;
use app\models\LikeForm;
use app\models\TrainerLikes;


class AboutUsController extends Controller
{
    public function actionIndex()
    {
        $allTrainers = Trainer::find()->with('trainerServices')->all();

        if (\Yii::$app->user->isGuest) {
            $allUserLikes = [];
        } else {
            $allUserLikes = TrainerLikes::find()->asArray()->select(['trainer_id'])->where(['user_id' => \Yii::$app->user->identity->user_id])->all();
            $allUserLikesArr = [];
            foreach ($allUserLikes as $userLike) {
                $allUserLikesArr[] = $userLike['trainer_id'];
            }
            $allUserLikes = $allUserLikesArr;
        }

        return $this->render('index', compact('allTrainers', 'allUserLikes'));
    }

    public function actionSetLike()
    {
        if (\Yii::$app->request->isAjax) {
            if (\Yii::$app->user->isGuest) return 'userIsGuest';
            else {
                if (\Yii::$app->request->get('action') === 'setLike') {
                    $newLike = new TrainerLikes();

                    $newLike->user_id = \Yii::$app->user->identity->user_id;
                    $newLike->trainer_id = \Yii::$app->request->get('trainer');

                    $newLike->save();

                    return 'setLike';
                }
                if (\Yii::$app->request->get('action') === 'unsetLike') {
                    $likeToDelete = TrainerLikes::find()->where(['user_id' => \Yii::$app->user->identity->user_id, 'trainer_id' => \Yii::$app->request->get('trainer')])->one();
                    $likeToDelete->delete();

                    return 'unsetLike';
                }
            }
        }
    }
}
