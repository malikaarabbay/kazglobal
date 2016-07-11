<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;

/**
 * OrderSearch represents the model behind the search form about `common\models\Order`.
 */
class OrderFormSearch extends Order
{
    public $date_from;
    public $date_to;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'delivery_id', 'status_id', 'paid', 'created', 'updated', 'service_id', 'company_id', 'user_login'], 'integer'],
            [['secret_key', 'user_firstname', 'user_lastname', 'user_secondname', 'user_email', 'user_address', 'delivery_address', 'user_phone', 'user_comment', 'ip_address', 'discount', 'admin_comment', 'created'], 'safe'],
            [['delivery_price', 'total_price'], 'number'],
            [['date_from', 'date_to'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $user = Yii::$app->user->identity;
        $id = $user->company_id;
        $query = Order::find()->where(['company_id' => $id, 'is_approved' => 0])->andWhere(['NOT IN', 'user_id', [Yii::$app->user->id]]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->orderBy('id DESC');
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user_firstname' => $this->user_firstname,
            'user_lastname' => $this->user_lastname,
            'user_secondname' => $this->user_secondname,
            'user_login' => $this->user_login,
            'delivery_id' => $this->delivery_id,
            'delivery_price' => $this->delivery_price,
            'total_price' => $this->total_price,
            'status_id' => $this->status_id,
            'paid' => $this->paid,
            'created' => $this->created,
            'updated' => $this->updated,
            'service_id' => $this->service_id,
        ]);

        $query->andFilterWhere(['like', 'secret_key', $this->secret_key])
            ->andFilterWhere(['like', 'user_login', $this->user_login])
            ->andFilterWhere(['like', 'user_firstname', $this->user_firstname])
            ->andFilterWhere(['like', 'user_lastname', $this->user_lastname])
            ->andFilterWhere(['like', 'user_secondname', $this->user_secondname])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'user_address', $this->user_address])
            ->andFilterWhere(['like', 'delivery address', $this->delivery_address])
            ->andFilterWhere(['like', 'user_phone', $this->user_phone])
            ->andFilterWhere(['like', 'user_comment', $this->user_comment])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'admin_comment', $this->admin_comment])
            ->andFilterWhere(['like', 'created', $this->created])
            ->andFilterWhere(['like', 'service_id', $this->service_id])
            ->andFilterWhere(['>=', 'created', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'created', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);
        return $dataProvider;
    }
}
