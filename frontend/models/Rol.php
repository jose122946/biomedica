<?php

namespace app\models;

use Yii;
use common\models\User;
use app\models\RolOperacion;
use app\models\Operacion;


/**
 * This is the model class for table "rol".
 *
 * @property integer $id
 * @property string $nombre
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $operaciones;
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 32],
            ['operaciones','safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }
    public function afterSave($insert, $changedAttributes){
    \Yii::$app->db->createCommand()->delete('rol_operacion', 'rol_id = '.(int) $this->id)->execute();
 
    foreach ($this->operaciones as $id) {
        $ro = new RolOperacion();
        $ro->rol_id = $this->id;
        $ro->operacion_id = $id;
        $ro->save();
  }
}
    public function getUsers()
 
{
        return $this->hasMany(User::className(), ['rol_id' => 'id']);
}
public function getRolOperaciones()
{
    return $this->hasMany(RolOperacion::className(), ['rol_id' => 'id']);
}
 
public function getOperacionesPermitidas()
{
    return $this->hasMany(Operacion::className(), ['id' => 'operacion_id'])
        ->viaTable('rol_operacion', ['rol_id' => 'id']);
}
 
public function getOperacionesPermitidasList()
{
    return $this->getOperacionesPermitidas()->asArray();
}
public static function getItems()
{
    $items = [];
    $models = MyMenuModel::find()->all();
    foreach($models as $model) {
        $item[] = ['label' => $model->title, 'url' => $model->getUrl()];
    }
}  
}
