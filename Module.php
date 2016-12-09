<?php

/**
 * @link https://github.com/humanized/yii2-seopage
 * @copyright Copyright (c) 2016 Humanized 
 * @license https://github.com/humanized/yii2-seopage/LICENSE
 */

namespace humanized\maintenance;

/**
 * 
 * @name Yii2 SEO Page Module
 * @version 1.0
 * @author Jeffrey Geyssens <jeffrey@humanized.it>
 * @package yii2-seopage
 * 
 */
class Module extends \yii\base\Module
{

    public function init()
    {
        if (\Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'humanized\seopage\commands';
        }
        parent::init();
    }

}
