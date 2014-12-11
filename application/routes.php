<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/
Route::any("/",function(){
	$view = View::make('global.template')->with(array(
		'title'		  => 'home',
		'description' => 'PainTrackr is an open-source app that monitors physical pain. It logs pain based on severity and location and stores this data so that it can be easily transmitted.',
		'keywords'	  => 'paintrackr, paintracker, pain trackr, pain tracker, chronic pain tracker, pain management, pain record, pain history, diary, pain tracking, pain logging, injury history, app store',
	));
	$view->nest('page','home.index');
	return $view;
});


Route::any("home",function(){
	$view = View::make('global.template')->with(array(
		'title'		  => 'home',
		'description' => 'PainTrackr is an open-source app that monitors physical pain. It logs pain based on severity and location and stores this data so that it can be easily transmitted.',
		'keywords'	  => 'paintrackr, paintracker, pain trackr, pain tracker, chronic pain tracker, pain management, pain record, pain history, diary, pain tracking, pain logging, injury history, app store',
	));
	$view->nest('page','home.index');
	return $view;
});


Route::any('about', function(){
	$view = View::make('global.template')->with(array(
		'title'		  => 'about',
		'description' => 'PainTrackr is an open-source app that monitors physical pain. It logs pain based on severity and location and stores this data so that it can be easily transmitted.',
		'keywords'	  => 'paintrackr, paintracker, pain trackr, pain tracker, chronic pain tracker, pain management, pain record, pain history, diary, pain tracking, pain logging, injury history, app store, involution studios',
	));
	$view->nest('page','about.index');
	return $view;
});

Route::any('faq', function(){
	$view = View::make('global.template')->with(array(
		'title'		  => 'FAQ',
		'description' => 'Frequently Asked Questions about PainTrackr',
		'keywords'	  => 'paintrackr, paintracker, pain trackr, pain tracker, chronic pain tracker, pain management, pain record, pain history, diary, pain tracking, pain logging, injury history, app store, faq',
	));
	$view->nest('page','faq.index');
	return $view;
});

Route::any('design', function(){
	$view = View::make('global.template')->with(array(
		'title'		  => 'design',
		'description' => 'Screenshots of PainTrackr, the open-source app that monitors physical pain',
		'keywords'	  => 'paintrackr, paintracker, pain trackr, pain tracker, chronic pain tracker, pain management, pain record, pain history, diary, pain tracking, pain logging, injury history, app store',
	));
	$view->nest('page','design.index');
	return $view;
});

Route::any('contact', function(){
	$view = View::make('global.template')->with(array(
		'title'		  => 'contact',
		'description' => 'Contact us about PainTrackr',
		'keywords'	  => 'paintrackr, paintracker, pain trackr, pain tracker, chronic pain tracker, pain management, pain record, pain history, diary, pain tracking, pain logging, injury history, app store',
	));
	$view->nest('page','contact.index');
	return $view;
});

Route::post('contact/send', function(){
	if( !isset($_POST['email']) || !isset($_POST['name']) || !isset($_POST['message']) ){
		header('Content-type: text/plain');
		return "no";
	} else {
		// paintrackr-feedback@goinvo.com
		$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/plain; charset=iso-8859-1";
		$headers[] = "From: ".$_POST['name']." <".$_POST['email'].">";
		$headers[] = "CC: Juhan Sonin <juhan@goinvo.com>";
		mail("paintrackr-feedback@goinvo.com","message from paintrackr.com",$_POST['message'],implode("\r\n", $headers));
		
		header('Content-type: text/plain');
		return "ok";
	}
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});