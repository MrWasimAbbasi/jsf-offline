<?php

namespace app\controllers;

use app\models\BloodCPDetail;
use app\models\Compaign;
use app\models\Donor;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\httpclient\Client;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSyncOnline()
    {
        $campaigns = Compaign::find()->all();
        return $this->render('sync-online',
            [
                'campaigns' => $campaigns
            ]
        );
    }

    public function actionGetCampaignData()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $campaign_id = $_REQUEST['campaign_id'];

        $donors = Donor::find()->with(['cpDetails', 'collections'])->where(['compaign_id' => $campaign_id])->asArray()->all();
        $campaign = Compaign::find()->where(['id' => $campaign_id])->asArray()->one();
        if (!empty($campaign['id'])) {
            unset($campaign['id']);
            foreach ($donors as $i => $donor) {
                unset($donors[$i]['id']);
            }
        }
        $response = [
            'message' => 'There are total ' . count($donors) . ' donors data to upload online for selected campaign',
            'donors' => $donors,
            'campaign' => $campaign,
        ];
        return $response;
    }
}