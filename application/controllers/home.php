<?php

class Home_Controller extends Base_Controller {

	public function action_index(){
		$view = View::make('global.template')->with(array(
			'title'		  => 'home',
			'description' => '',
			'keywords'	  => '',
		));
		$view->nest('page','home.index');
		return $view;
	}

}