<?php

namespace app\controllers;

use app\models\Card;
use app\models\UserCard;
use yii\data\Pagination;
use Yii;

use yii\web\Controller;

class ClubCardsController extends Controller
{
    public function actionIndex($type, $hours, $duration)
    {
        if ($type == 'all' && $hours == 'all' && $duration == 'all') {
            $query = Card::find();
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 20]);
            $allClubCards = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        } else {
            if ($type != 'all') $arr['type_id'] = $type;
            if ($hours != 'all') $arr['visiting_hours_id'] = $hours;
            if ($duration != 'all') $arr['duration_id'] = $duration;

            $query = Card::find()->where($arr);
            $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12]);
            $allClubCards = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        }

        return $this->render('index', compact('allClubCards', 'pages', 'type', 'hours', 'duration'));
    }

//     public function actionSetSort($type, $hours, $duration, $sort)
//     {
//         if (\Yii::$app->request->isAjax) {
            
//             if ($type == 'all' && $hours == 'all' && $duration == 'all') {

//                 if ($sort === 'default') {
//                     $query = Card::find();
//                 }
//                 if ($sort === 'price') {
//                     $query = Card::find()->orderBy([
//                         'price' => SORT_ASC
//                     ]);
//                 }
//                 if ($sort === 'popularity') {
//                    // SELECT * from cards c LEFT JOIN (SELECT card_id, COUNT(*) as count from users_cards GROUP BY card_id) uc on uc.card_id=c.card_id ORDER BY count DESC');
//                    // SELECT `c`.`card_id`, `type_id`, `name`, `short_name`, `duration_id`, `description`, `visiting_hours_id`, `price` FROM `cards` `c` LEFT JOIN (SELECT `card_id`, COUNT(*) AS `count` FROM `users_cards` GROUP BY `card_id`) `u` ON u.card_id = c.card_id ORDER BY `count` DESC LIMIT 12


//                    $sql1 = 'SELECT `card_id`, COUNT(*) AS `count` FROM `users_cards` GROUP BY `card_id`';
//                    $sql2 = "SELECT `c`.`card_id`, `type_id`, `name`, `short_name`, `duration_id`, `description`, `visiting_hours_id`, `price` FROM `cards` `c` LEFT JOIN $sql1 `u` ON u.card_id = c.card_id ORDER BY `count` DESC";
// $sql = 'SELECT `c`.`card_id`, `type_id`, `name`, `short_name`, `duration_id`, `description`, `visiting_hours_id`, `price` FROM `cards` `c` LEFT JOIN (SELECT `card_id`, COUNT(*) AS `count` FROM `users_cards` GROUP BY `card_id`) `u` ON u.card_id = c.card_id ORDER BY `count` DESC';

//                 $query = Card::findBySql($sql);
            
//             }

//             } else {
//                 if ($type != 'all') $arr['type_id'] = $type;
//                 if ($hours != 'all') $arr['visiting_hours_id'] = $hours;
//                 if ($duration != 'all') $arr['duration_id'] = $duration;

//                 if ($sort === 'default') {
//                     $query = Card::find()->where($arr);
//                 }
//                 if ($sort === 'price') {
//                     $query = Card::find()->where($arr)->orderBy([
//                         'price' => SORT_ASC
//                     ]);
//                 }
//                 if ($sort === 'popularity') {
//                     $sql = "SELECT `c`.`card_id`, `type_id`, `name`, `short_name`, `duration_id`, `description`, `visiting_hours_id`, `price` FROM `cards` `c` LEFT JOIN (SELECT `card_id`, COUNT(*) AS `count` FROM `users_cards` GROUP BY `card_id`) `u` ON u.card_id = c.card_id 
//                     WHERE type_id=$type and visiting_hours_id=$hours and duration_id=$duration
//                     ORDER BY `count` DESC";

//                     $query = Card::findBySql($sql);
//                 }
//             }

//             $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12]);
//             $allClubCards = $query->offset($pages->offset)
//                 ->limit($pages->limit)
//                 ->all();

//             return $this->renderAjax('cards', compact('allClubCards', 'pages', 'type', 'hours', 'duration'));
//         }  
//     }
}
