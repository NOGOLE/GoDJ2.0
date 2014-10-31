<?php namespace Godj\Repositories\Mood;
use Mood;

class EloquentMoodRepository implements MoodRepository {

public function all() {

return Mood::all();
}

public function find($id) {
return Mood::findOrFail($id);
}

public function create($input) {

return Mood::create($input);
}

public function destroy($id)
{
return Mood::findOrFail($id)->destroy();
}
}
