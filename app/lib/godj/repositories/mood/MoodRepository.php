<?php namespace Godj\Repositories\Mood;

interface MoodRepository {

public function all();
public function find($id);
public function create($input);
public function destroy($id);

}
