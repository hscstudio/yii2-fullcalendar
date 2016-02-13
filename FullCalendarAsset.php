<?php

namespace hscstudio\calendar;

use Yii;
use yii\web\AssetBundle;

/**
 * @link http://www.hafidmukhlasin.com/
 * @author Hafid Mukhlasin <hafidmukhlasin@gmail.com>
 */
class FullCalendarAsset extends AssetBundle
{
	/**
	 * [$sourcePath description]
	 * @var string
	 */
	public $sourcePath = '@bower/fullcalendar/dist';
	/**
	 * the language the calender will be displayed in
	 * @var string ISO2 code for the wished display language
	 */
	public $language = NULL;
	/**
	 * [$autoGenerate description]
	 * @var boolean
	 */
	public $autoGenerate = true;
	/**
	 * tell the calendar, if you like to render google calendar events within the view
	 * @var boolean
	 */
	public $googleCalendar = false;

	/**
	 * [$css description]
	 * @var array
	 */
	public $css = [
		'fullcalendar.css',
	];
	/**
	 * [$js description]
	 * @var array
	 */
	public $js = [
		'fullcalendar.js',
		'lang-all.js',
	];

	/**
	 * [$depends description]
	 * @var array
	 */
	public $depends = [
		'yii\bootstrap\BootstrapAsset',
		'hscstudio\calendar\MomentAsset',
		'yii\jui\JuiAsset',
	];
	/**
	 * @inheritdoc
	 */
	public function registerAssetFiles($view)
	{
		if($this->googleCalendar)
		{
			$this->js[] = 'gcal.js';
		}
		parent::registerAssetFiles($view);
	}
}