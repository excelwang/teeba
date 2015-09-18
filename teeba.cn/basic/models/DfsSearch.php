<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dfs;

/**
 * DfsSearch represents the model behind the search form about `app\models\Dfs`.
 */
class DfsSearch extends Dfs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'min_file_size', 'max_file_size', 'isDirectIO', 'isSumClose', 'isSyncTest'], 'integer'],
            [['type', 'status', 'atime', 'summary', 'log'], 'safe'],
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
        $query = Dfs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'min_file_size' => $this->min_file_size,
            'max_file_size' => $this->max_file_size,
            'isDirectIO' => $this->isDirectIO,
            'isSumClose' => $this->isSumClose,
            'isSyncTest' => $this->isSyncTest,
            'atime' => $this->atime,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'log', $this->log]);

        return $dataProvider;
    }
}
