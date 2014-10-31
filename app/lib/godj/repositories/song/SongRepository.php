<?php namespace Godj\Repositories\Song;

interface SongRepository {

public function all();
public function find($id);
public function create($input);
public function destroy($id);

}
