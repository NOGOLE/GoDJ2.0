<?php namespace Godj\Repositories;
use Illuminate\Support\ServiceProvider;
 
class StorageServiceProvider extends ServiceProvider {
 
  public function register()
  {
    $this->app->bind(
	'Godj\Repositories\User\UserRepository',
	'Godj\Repositories\User\EloquentUserRepository',
	'Godj\Repositories\Song\SongRepository',
	'Godj\Repositories\Song\EloquentSongRepository',
	'Godj\Repositories\Mood\MoodRepository',
	'Godj\Repositories\Mood\EloquentMoodRepository'
	);
}
}
