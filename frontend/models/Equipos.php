<?php

namespace app\models;

use Yii;
use app\models\Equipos;

/**
 * This is the model class for table "Equipos".
 *
 * @property integer $id_equipo
 * @property string $nombre_equipo
 * @property string $clave_equipo
 * @property string $modelo
 * @property integer $id_area
 * @property integer $descripcionins
 * @property integer $descripcionesp
 * @property integer $marca
 * @property integer $fisico
 * @property Areas $idArea
 * @property Areas $numinv
 * @property Correctivas[] $correctivas
 * @property Preventivas[] $preventivas
 * @property Solicitud[] $solicituds
 */
class Equipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Equipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_equipo', 'clave_equipo', 'modelo', 'id_area'], 'required', 'message' => 'No puede estar vacio'],
            [['id_area'], 'integer'],
            [['numinv'],'unique', 'targetClass' => Equipos::className(), 'message' => 'La clave de equipo ya esta en uso.'],
            [['nombre_equipo', 'clave_equipo', 'modelo'], 'string', 'max' => 255],
            [['descripcionins','descripcionesp','marca','fisico','numinv'],'safe',]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_equipo' => 'Id Equipo',
            'nombre_equipo' => 'Nombre Equipo',
            'clave_equipo' => 'Clave Equipo',
            'modelo' => 'Modelo',
            'id_area' => 'Id Area',
            'numinv' => 'Numero de inventario',
            'marca' => 'Marca',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArea()
    {
        return $this->hasOne(Areas::className(), ['id_area' => 'id_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorrectivas()
    {
        return $this->hasMany(Correctivas::className(), ['id_equipo' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreventivas()
    {
        return $this->hasMany(Preventivas::className(), ['id_equipo' => 'id_equipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['id_equipo' => 'id_equipo']);
    }
}
