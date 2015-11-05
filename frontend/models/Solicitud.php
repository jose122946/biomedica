<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property integer $id_solicitud
 * @property integer $id_equipo
 * @property integer $id_area
 * @property string $estado
 * @property string $fecha
 *
 * @property Equipos $idEquipo
 * @property Areas $idArea
 */
class Solicitud extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_equipo', 'id_area', 'fecha'], 'required'],
            [['id_equipo', 'id_area'], 'integer'],
            [['fecha','estado'], 'safe'],
            [['estado'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_solicitud' => 'Id Solicitud',
            'id_equipo' => 'Id Equipo',
            'id_area' => 'Id Area',
            'estado' => 'Estado',
            'fecha' => 'Fecha',
            'idEquipo.nombre_equipo' => 'Equipo',
            'idArea.nombre_area' =>'Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEquipo()
    {
        return $this->hasOne(Equipos::className(), ['id_equipo' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArea()
    {
        return $this->hasOne(Areas::className(), ['id_area' => 'id_area']);
    }
}
