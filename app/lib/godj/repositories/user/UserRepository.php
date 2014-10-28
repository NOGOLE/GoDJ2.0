<?php namespace godj\repositories\user;

interface UserRepository {

public function all();
public function find($id);
public function create($input);
public function destroy($id);

}
