<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solicitud;
//use app\models\Equipos;

/**
 * SolicitudSearch represents the model behind the search form about `app\models\Solicitud`.
 */
class SolicitudSearch extends Solicitud
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_solicitud', 'id_equipo', 'id_area'], 'integer'],
            [['estado', 'fecha'],'safe'],
            [['nombre_equipo','nombre_area'],'safe'],
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
        
        $query = Solicitud::find();
        }else
        {
            $query = Solicitud::find()
            ->joinWith('idEquipo')
            ->joinWith('idArea')
            ->where(['Equipos.id_area' => Yii::$app->user->identity->id_departamento]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //$this->load($params);
        
       
        $dataProvider->sort->attributes['idEquipo.nombre_equipo'] = [
    'asc' => ['nombre_equipo' => SORT_ASC],
    'desc' => ['nombre_equipo' => SORT_DESC],
    ];
     $dataProvider->sort->attributes['idArea.nombre_area'] = [
    'asc' => ['nombre_area' => SORT_ASC],
    'desc' => ['areas.nombre_area' => SORT_DESC],
    ];


       // if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
         //   return $dataProvider;
        //}
   
        $query->andFilterWhere([
            'id_solicitud' => $this->id_solicitud,
            'id_equipo' => $this->id_equipo,
            'id_area' => $this->id_area,
            'fecha' => $this->fecha,
            'Equipos.nombre_equipo' =>$this->idEquipo,
        ]);

        $query->andFilterWhere(['like', 'estado', $this->estado])
        ->andFilterWhere(['like', 'nombre_equipo', $this->idEquipo])
        /*->andFilterWhere(['like', 'nombre_area', $this->idEquipo])*/;

        return $dataProvider;
    }
}
