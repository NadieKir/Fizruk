<?php

namespace app\controllers;

use app\models\Card;
use app\models\MarathonParticipant;
use app\models\User;

use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $top3Cards = Card::findAll([36, 61, 79]);
        $marathonParticipants = MarathonParticipant::find()->count();
        $currUser = \Yii::$app->user->identity;
        $isUserMarathonPart = MarathonParticipant::findOne(['user_id' => $currUser->user_id]);

        return $this->render('index', compact('top3Cards', 'marathonParticipants', 'currUser', 'isUserMarathonPart'));
    }

    public function actionEnrollMarathon()
    {
        if (\Yii::$app->request->isAjax) {
            $newMarathonParticipan = new MarathonParticipant();
            $newMarathonParticipan->user_id = \Yii::$app->request->get('user');
            $newMarathonParticipan->save();

            return $newMarathonParticipan->participant_id;
        }
    }

    public static function addEnrollMarathonBtnAttrs($isUserMarathonPart)
    {
        if (\Yii::$app->user->isGuest) {
            return "data-forbidden='guest'";
        } else if ($isUserMarathonPart) {
            return "data-forbidden='participant'";
        } else {
            return "data-hystmodal='#marathonModal'";
        }
    }
}
