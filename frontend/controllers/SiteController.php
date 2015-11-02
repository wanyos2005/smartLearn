<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\person\models\Person;
use app\modules\institutions\models\Institutions;
use app\modules\trainers\models\Trainers;
use app\models\Conveniencies;
use app\models\Constituencies;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
    public function actions() {
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
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSay($target = 'World') {
        return $this->render('say', ['target' => $target]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
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
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Sign user up
     * 
     * @param string $prvlg user profile
     * @return view
     */
    public function actionSignUp($prvlg) {
        $detail = $this->detailModel($prvlg);
        $user = new SignupForm;
        $user->profile = $prvlg;

        if ($user->load(Yii::$app->request->post()) && $detail->load(Yii::$app->request->post()) && $user->passwordConfirm($user) && $user->validate() && $detail->validate())
            $this->theTransaction($user, $detail);
        
        return $this->render('signUp', ['user' => $user, 'detail' => $detail, 'view' => $this->detailView($prvlg)]);
    }

    /**
     * 
     * @param string $prvlg user profile
     * @return Person | Institutions | Trainers model
     */
    public function detailModel($prvlg) {
        switch ($prvlg) {
            case Conveniencies::institution: $detail = new Institutions;
                break;
            case Conveniencies::trainer: $detail = new Trainers;
                break;

            default: $detail = new Person;
                break;
        }

        return $detail;
    }

    /**
     * 
     * @param SignUp $user model
     * @param Person $detail model
     * @return url redirect user appropriately
     */
    public function theTransaction($user, $detail) {
        if (!$user->hasErrors() && !$detail->hasErrors()) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $user = $user->signup();
                $detail->id = $user->id;
                $detail->save(false);
                $transaction->commit();
                return $this->goHome();
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
    }

    /**
     * 
     * @param string $prvlg user profile
     * @return string form to be rendered
     */
    public function detailView($prvlg) {
        switch ($prvlg) {
            case Conveniencies::institution: $view = 'institution';
                break;
            case Conveniencies::trainer: $view = 'trainer';
                break;

            default: $view = 'person';
                break;
        }

        return $view;
    }

    /**
     * 
     * @param integer $county_id county id
     */
    public function actionDynamicConstituencies($county_id) {
        Conveniencies::populateDropDown(Constituencies::constituenciesAsArray(empty($county_id) ? 'null' : $county_id), 'Constituencies');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
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
    public function actionResetPassword($token) {
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
