<?php
/**
 * User: TheCodeholic
 * Date: 8/31/2019
 * Time: 6:23 PM
 */

namespace thecodeholic\yii2grapesjs\actions;


use Yii;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Class UploadAction
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package thecodeholic\yii2grapesjs\actions
 */
class UploadAction extends BaseAction
{
    public function run()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $response = [];
        /**
         * @var UploadedFile[] $files
         */
        $files = UploadedFile::getInstancesByName('files');
        foreach ($files as $file) {
            $stream = fopen($file->tempName, 'r+');
            Yii::$app->fs->writeStream($file->name, $stream);
            $response[] = '/files/' . $file->name;
        }
        return [
            'data' => $response
        ];
    }
}
