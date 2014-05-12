<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new UserTestFunctional(new sfBrowser());
$browser->loadData();

$criteria = new Criteria();
$criteria->add(LessonPeer::TITLE, 'Renässansen', Criteria::EQUAL);
$lesson = LessonPeer::doSelectOne($criteria);

$lessonID = $lesson->getLessonid();
$lessonTitleSlug = Webschool::slugify($lesson->getTitle());

$browser->info('Functional test fail show lesson - User unuthenticated')->

	info(' 01 - Unauthenticated user tires to get lesson')->
	
	get('/lektion/'. $lessonID . '/' . $lessonTitleSlug)->
	
	with('request')->begin()->
		isParameter('module', 'lesson')->
		isParameter('action', 'lesson')->
	end()->
	
	with('response')->begin()->
		checkElement('#logOutButton', false)->
		checkElement('#logInButton', true)->
	end()->
	
	info(' 04 - If all test passes User got the login page')
;
