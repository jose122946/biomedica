<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "correctivas".
 *
 * @property integer $id_correctiva
 * @property integer $id_equipo
 * @property string $fecha_inicio
 * @property integer $dias
 * @property string $estado
 * @property string $diagnostico
 * @property string $reparacion
 *
 * @property Equipos $idEquipo
 */
class Correctivas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'correctivas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo', 'fecha_inicio', 'dias', 'estado'], 'required','message' =>'No puede estas vacio'],
            [['id_equipo', 'dias'], 'integer', 'message' => 'Deberia ser un numero'],
            [['fecha_inicio'], 'safe'],
            [['diagnostico', 'reparacion'], 'string'],
            [['estado'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_correctiva' => 'Id Correctiva',
            'id_equipo' => 'Id Equipo',
            'fecha_inicio' => 'Fecha Inicio',
            'dias' => 'Dias',
            'estado' => 'Estado',
            'diagnostico' => 'Diagnostico',
            'reparacion' => 'Reparacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipo()
    {
        return $this->hasOne(Equipos::className(), ['id_equipo' => 'id_equipo']);
    }
}
