<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new UserTestFunctional(new sfBrowser());
$browser->loadData();

$criteria = new Criteria();
$criteria->add(LessonPeer::TITLE, 'Barocken');
$lessonBarocken = LessonPeer::doSelectOne($criteria);

$browser->info('Functional test successful do quiz without giving any answers')->
	
	info(' 01 - Login form is visible')->
	get('/')->
	
	with('request')->begin()->
		isParameter('module', 'user')->
		isParameter('action', 'index')->
	end()->
	
	with('response')->begin()->
		checkElement('#logInButton', true)->
		checkElement('#logOutButton', false)->
	end()->
	
	info(' 02 - User clicks "Logga in" with username "GulligaHannes" and password "12345678"')->
	setField('login[username]', 'GulligaHannes')->
	setField('login[password]', '12345678')->
	click('Logga in')->
	
	with('form')->begin()->
		hasErrors(false)->
	end()->
	
	with('request')->begin()->
		isParameter('module', 'user')->
		isParameter('action', 'index')->
	end()->
	
	isRedirected()->
	followRedirect()->
	
	with('request')->begin()->
		isParameter('module', 'user')->
		isParameter('action', 'index')->
	end()->
	
	with('response')->begin()->
		checkElement('#logOutButton', true)->
		checkElement('#logInButton', false)->
	end()->
	
	info(' 03 - User click on link to lesson "Barocken"')->
	
	get('/lektion/' . $lessonBarocken->getLessonid() . '/' . Webschool::slugify($lessonBarocken->getTitle()))->
	
	with('request')->begin()->
		isParameter('module', 'lesson')->
		isParameter('action', 'lesson')->
	end()->
	
	with('response')->begin()->
		checkElement('h1', 'Barocken')->
	end()->
	
	click('Till Quizet')->
	
	with('request')->begin()->
		isParameter('module', 'lesson')->
		isParameter('action', 'quiz')->
	end()->
	
	with('response')->begin()->
		checkElement('h1', '/Barocken - Quiz/')->
	end()->
	
	click('Skicka')->
	
	with('request')->begin()->
		isParameter('module', 'lesson')->
		isParameter('action', 'quizResult')->
	end()->
	
	isRedirected()->
	followRedirect()->
	
	with('request')->begin()->
		isParameter('module', 'lesson')->
		isParameter('action', 'quizResult')->
	end()->
	
	with('response')->begin()->
		checkElement('h1', '/Barocken - Resultat/')->
		checkElement('div.panel p', '/Uselt resultat! Du fick 0/')->
	end()->
	
	info(' 04 - If all test passes User recived 0 points')
;
