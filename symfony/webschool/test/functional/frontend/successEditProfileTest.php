<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new UserTestFunctional(new sfBrowser());
$browser->loadData();

$browser->info('Functional test successful edit profile')->
	
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
		checkElement('#pagecontent h1', '/Hannes Karlsson/')->
	end()->
	
	info(' 3 - User goes to edit account')->
	get('/redigera-konto')->
	
	with('request')->begin()->
		isParameter('module', 'user')->
		isParameter('action', 'edit')->
	end()->
	
	with('response')->begin()->
		checkElement('#pagecontent h1', '/Redigera konto/')->
		checkElement('#saveButton', true)->
	end()->
	
	info(' 02 - User clicks "Ok" with parameters')->
	setField('user[name]', 'Hannes Hansson')->
	setField('user[email]', 'fula_hannes@hotmail.com')->
	setField('user[username]', 'FulaHannes')->
	setField('user[passwordOld]', '12345678')->
	click('Ok')->
	
	with('form')->begin()->
		hasErrors(false)->
	end()->
	
	with('request')->begin()->
		isParameter('module', 'user')->
		isParameter('action', 'edit')->
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
		checkElement('#pagecontent h1', '/Hannes Hansson/')->
		checkElement('.alert-box p', '/har sparats/')->
	end()->
	
	info(' 03 - If all tests is ok, user have successfully edit profile')
;
