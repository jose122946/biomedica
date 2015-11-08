<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preventivas".
 *
 * @property integer $id_preventica
 * @property integer $id_equipo
 * @property string $fecha_inicio
 * @property integer $dias
 * @property integer $estado
 *
 * @property Equipos $idEquipo
 */
class Preventivas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preventivas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo', 'fecha_inicio', 'dias', 'estado'], 'required'],
            [['id_equipo', 'dias'], 'integer'],
            [['fecha_inicio'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_preventica' => 'Id',
            'id_equipo' => 'Id Equipo',
            'fecha_inicio' => 'Fecha Inicio',
            'dias' => 'Dias',
            'estado' => 'Estado',
            'idEquipo.clave_equipo' => 'Clave institucional',
            'idEquipo.idArea.nombre_area' => 'Área',
            'idEquipo.descripcionins' => 'Descipción institucional',
            'idEquipo.descripcionesp' => 'Descripción específica',
            'idEquipo.fisico' => 'Estado físico' 
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
