<?php namespace Godj\Repositories\User;

interface UserRepository {

public function all();
public function find($id);
public function create($input);
public function destroy($id);

}
