<?php namespace godj\repositories;
use Illuminate\Support\ServiceProvider;
 
class StorageServiceProvider extends ServiceProvider {
 
  public function register()
  {
    $this->app->bind(
	'godj\repositories\user\UserRepository',
	'godj\repositories\user\EloquentUserRepositoy'
	);
}
}
