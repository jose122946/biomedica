<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipos;

/**
 * EquiposSearch represents the model behind the search form about `app\models\Equipos`.
 */
class EquiposSearch extends Equipos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo', 'id_area'], 'integer'],
            [['nombre_equipo', 'clave_equipo', 'modelo'], 'safe'],
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
        $query = Equipos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_equipo' => $this->id_equipo,
            'id_area' => $this->id_area,
        ]);

        $query->andFilterWhere(['like', 'nombre_equipo', $this->nombre_equipo])
            ->andFilterWhere(['like', 'clave_equipo', $this->clave_equipo])
            ->andFilterWhere(['like', 'modelo', $this->modelo]);

        return $dataProvider;
    }
}
