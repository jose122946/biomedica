<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $id_departamento;
    public $nombre;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['nombre', 'required','message' => 'El nombre no puede estar vacio'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required','message' => 'El nombre de usurario no puede estar vacio'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nombre de usuario ya esta en uso.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'El email no puede estar vacio'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Esta dirección de correo ya esta registrado'],

            ['password', 'required', 'message' => 'La contraseña no puede estar vacia'],
            ['password', 'string', 'min' => 6],
            ['id_departamento', 'required', 'message' => 'Por favor seleccione un departamento es ¡importante!'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->id_departamento = $this->id_departamento;
            $user->nombre = $this->nombre;
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
