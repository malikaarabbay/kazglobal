<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserFormSearch extends User
{
//    public $date_from;
//    public $date_to;

    public function rules()
    {
        return [
//            [['login', 'firstname'], 'required'],
            [['id', 'birthday', 'role', 'updated', 'deleted', 'status', 'login'], 'integer'],
            [['firstname', 'lastname', 'secondname', 'phone', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'created'], 'safe'],
//            [['date_from', 'date_to'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $user = Yii::$app->user->identity;
        $id = $user->company_id;
        $query = User::find()->where(['company_id' => $id])->andWhere(['NOT IN', 'id', [Yii::$app->user->id]])->andWhere(['NOT IN', 'status_id', [1]]);
//        $query = User::find()->where(['parent_id' => Yii::$app->user->id])->andWhere(['NOT IN', 'id', [Yii::$app->user->id]])->andWhere(['NOT IN', 'status_id', [1]]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'login' => $this->login,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'secondname' => $this->secondname,
            'birthday' => $this->birthday,
            'role' => $this->role,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'secondname', $this->secondname])
            ->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email]);
//        ->andFilterWhere(['>=', 'created', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
//        ->andFilterWhere(['<=', 'created', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }
}
