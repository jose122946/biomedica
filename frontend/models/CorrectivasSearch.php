<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Correctivas;

/**
 * CorrectivasSearch represents the model behind the search form about `app\models\Correctivas`.
 */
class CorrectivasSearch extends Correctivas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_correctiva', 'id_equipo', 'dias'], 'integer'],
            [['fecha_inicio', 'estado', 'diagnostico', 'reparacion'], 'safe'],
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
        if (Yii::$app->user->identity->rol_id == 2) {
            # code...   
        $query = Correctivas::find();
    }
    else
    {
        $query = Correctivas::find()
        ->joinWith('idEquipo')
        ->where(['id_area' => Yii::$app->user->identity->id_departamento]);
    }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       /* $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            'id_correctiva' => $this->id_correctiva,
            'id_equipo' => $this->id_equipo,
            'fecha_inicio' => $this->fecha_inicio,
            'dias' => $this->dias,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'diagnostico', $this->diagnostico])
            ->andFilterWhere(['like', 'reparacion', $this->reparacion]);

        return $dataProvider;
    }
}
