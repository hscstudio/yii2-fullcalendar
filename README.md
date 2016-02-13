# yii2-fullcalendar

Yii 2 Extension for library calendar.io

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist hscstudio/yii2-fullcalendar "*"
```

or add

```
"hscstudio/yii2-fullcalendar": "*"
```

to the require section of your `composer.json` file.

Usage
-----

You may have a table event (id, title (varchar), start (date/datetime), end (date/datetime))

In view
```php	
<?php $eventUrl = \yii\helpers\Url::to(['event-calendar']); ?>
<?= hscstudio\calendar\FullCalendar::widget([
	'options'=>[
		'id'=>'calendar',
		'header'=>[
			'left'=>'prev,next today',
			'center'=>'title',
			'right'=>'month,agendaWeek,agendaDay',
		],
		'editable'=> true,
		'eventLimit'=>true, // allow "more" link when too many events
		'events' => [
			'url' => $eventUrl,
		],
	]
]) ?>
```

In controller to get events
```php
public function actionEventCalendar($start=NULL,$end=NULL,$_=NULL){

	\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

	$model= \app\models\Event::find()->all();
	if(!empty($start) and !empty($end)){
		$model= \app\models\Event::find()
			->where(['>=','start',date('Y-m-d 00:00:01',$start)])
			->andWhere(['<=','end',date('Y-m-d 23:59:59',$end)])
			->all();
	}

	$events = [];
	foreach ($model as $event) {
		$events[]=[
			'title'=>$event->title,
			'start'=>date('Y-m-d 00:00:01',strtotime($event->start)),
			'end'=>date('Y-m-d 23:59:59', strtotime($event->end)),
			//'color'=>'#CC0000',
			//'allDay'=>true,
			//'url'=>'http://anyurl.com'
		];
	}
	return $events;
}
```

## How to Contribute

This tools is an OpenSource project so your contribution is very welcome.

In order to get started:

- Install this in your local (read installation section)
- Clone this repository.
- Check [README.md](README.md).
- Send [pull requests](https://github.com/hscstudio/yii2-calendar/pulls).

Aside from contributing via pull requests you may [submit issues](https://github.com/hscstudio/yii2-calendar/issues).

## Our Team

- [Hafid Mukhlasin](http://www.hafidmukhlasin.com) - Project Leader / Indonesian Yii developer.

We'd like to thank our [contributors](https://github.com/hscstudio/yii2-calendar/graphs/contributors) for improving
this tools. Thank you!

Jakarta - Indonesia
