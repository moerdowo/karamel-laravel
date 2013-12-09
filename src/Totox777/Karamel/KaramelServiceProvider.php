<?php namespace Totox777\Karamel;

use Illuminate\Support\ServiceProvider;

class KaramelServiceProvider extends ServiceProvider {

	protected $defer = false;

	public function boot()
	{
		$this->package('totox777/karamel');
	}

	public function register()
	{
		$app = $this->app;

		$this->app['karamel'] = $this->app->share(function($app)
	    {
	        return new Karamel($app['config']->get('karamel::apikey'),$app['config']->get('karamel::memberid'));
	    });
	}

	public function provides()
	{
		return array();
	}

}