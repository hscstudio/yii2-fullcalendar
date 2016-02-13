<?php

namespace hscstudio\calendar;

use yii\web\AssetBundle;

/**
 * @link http://www.hafidmukhlasin.com/
 * @author Hafid Mukhlasin <hafidmukhlasin@gmail.com>
 */
class MomentAsset extends AssetBundle
{
	/**
	 * [$sourcePath description]
	 * @var string
	 */
	public $sourcePath = '@bower/moment';
	/**
	 * [$js description]
	 * @var array
	 */
	public $js = [
		'moment.js'
	];

	public $depends = [
		'yii\bootstrap\BootstrapAsset',
	];
}