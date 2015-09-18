<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ycsb;

/**
 * YcsbSearch represents the model behind the search form about `app\models\Ycsb`.
 */
class YcsbSearch extends Ycsb
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recordcount', 'operationcount', 'readallfields', 'id'], 'integer'],
            [['readproportion', 'updateproportion', 'scanproportion', 'insertproportion'], 'number'],
            [['requestdistribution'], 'safe'],
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
        $query = Ycsb::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'recordcount' => $this->recordcount,
            'operationcount' => $this->operationcount,
            'readallfields' => $this->readallfields,
            'readproportion' => $this->readproportion,
            'updateproportion' => $this->updateproportion,
            'scanproportion' => $this->scanproportion,
            'insertproportion' => $this->insertproportion,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'requestdistribution', $this->requestdistribution]);

        return $dataProvider;
    }
}
