<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use trntv\filekit\actions\UploadAction;
use common\models\KeyStorageItem;
/**
* Demo controller
*/
class DemoController extends Controller
{
    public function actions(){
        return [
            'upload'=>[
                'class'=>'trntv\filekit\actions\UploadAction',
                'multiple' => true,
                'disableCsrf' => false,
                'responseFormat' => 'json',
                'responsePathParam' => 'path',
                'responseBaseUrlParam' => 'base_url',
                'responseUrlParam' => 'url',
                'responseMimeTypeParam' => 'type',
                'responseNameParam' => 'name',
                'responseSizeParam' => 'size',
                'fileStorage' => 'fileStorage', // Yii::$app->get('fileStorage')
                'fileStorageParam' => 'fileStorage', // ?fileStorage=someStorageComponent
                'sessionKey' => '_uploadedFiles',
                'allowChangeFilestorage' => false,
                'validationRules' => [
                    // 'maxSize' => 7000,
                ],
                // 'on afterSave' => function($event) {
                //      /* @var $file \League\Flysystem\File */
                //      $file = $event->file;
                //      // do something (resize, add watermark etc)
                // }
            ]
        ];
    }
    public function actionFileUpload()
    {
        return $this->render('file-upload');
    }

    public function actionTest()
    {
        $option = KeyStorageItem::getOption('test2');
        var_dump($option);
    }
}