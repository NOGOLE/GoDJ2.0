<?php namespace Godj\Repositories\Song;
use Song;

class EloquentSongRepository implements SongRepository {

public function all() {

return Song::all();
}

public function find($id) {
return Song::findOrFail($id);
}

public function create($input) {

return Song::create($input);
}

public function destroy($id)
{
return Song::findOrFail($id)->destroy();
}
}
