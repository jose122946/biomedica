<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Preventivas;

/**
 * PreventivasSearch represents the model behind the search form about `app\models\Preventivas`.
 */
class PreventivasSearch extends Preventivas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_preventica', 'id_equipo', 'dias', 'estado'], 'integer'],
            [['fecha_inicio'], 'safe'],
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
        if(Yii::$app->user->identity->rol_id == 2)
        {
        $query = Preventivas::find();
        }
        else
        {
            $query = Preventivas::find()
            ->joinWith('idEquipo')
            ->where(['id_area' => Yii::$app->user->identity->id_departamento]);
        }
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
            'id_preventica' => $this->id_preventica,
            'id_equipo' => $this->id_equipo,
            'fecha_inicio' => $this->fecha_inicio,
            'dias' => $this->dias,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
