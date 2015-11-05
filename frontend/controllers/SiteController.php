<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Solicitud;
use common\models\AccessHelpers;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','about'],
                'rules' => [
                    [
                        'actions' => ['login','signup','error','index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['about','logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */

    public function beforeAction($action)
    {
    if (!parent::beforeAction($action)) {
        return false;
    }
 
    $operacion = str_replace("/", "-", Yii::$app->controller->route);
 
    $permitirSiempre = ['site-error','site-captcha','site-logout','site-index','site-signup','site-login','site-contact','user-index'];
 
    if (in_array($operacion, $permitirSiempre)) {
        return true;
    }
 
    if (!AccessHelpers::getAcceso($operacion)) {
        echo $this->render('/site/nopermitido');
        return false;
    }
 
    return true;
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->set('rol_id',Yii::$app->user->identity->rol_id);
            if($_SESSION['rol_id']==3)
            {
            return $this->redirect(['/site/administrador']);
            }
            else
            {
               if($_SESSION['rol_id']==1)
               {
                return $this->redirect(['/site/departamento']);  
               }
               else
                {return $this->redirect(['/site/biomedica']);  }
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Gracias por contactarnos');
            } else {
                Yii::$app->session->setFlash('error', 'Ups! Hubo un error');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionAdministrador()
    {
        return $this->render('administrador');
    }

    public function actionNuevasolocitud()
{
    

    return $this->render('nuevasolocitud');
}

    public function actionDepartamento()
    {
        return $this->render('departamento');
    }
     public function actionNuevopreventivo()
    {
        return $this->render('nuevopreventivo');
    }
     public function actionPreventivas()
    {
        return $this->render('preventivas');
    }
    public function actionCorrectivas()
    {
        return $this->render('correctivas');
    }
    public function actionEquipos()
    {
        return $this->render('equipos');
    }
     public function actionSolicitudes()
    {
        return $this->render('solicitudes');
    }
    public function actionBiomedica()
    {
        return $this->render('biomedica');
    }
 public function actionUsuarios()
    {
        return $this->render('usuarios');
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Checa tu email y sigue las instrucciones');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Lo sentimos pero el correo proporcionado no esta activo en el sistema. Escriba nuevamente.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
