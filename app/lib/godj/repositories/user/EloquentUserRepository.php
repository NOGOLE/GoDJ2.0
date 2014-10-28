<?php namespace godj\repositories\user;
use User;

class EloquentUserRepository implements UserRepository {

public function all() {

return User::all();
}

public function find($id) {
return User::findOrFail($id);
}

public function create($input) {

return User::create($input);
}

public function destroy($id)
{
return User::findOrFail($id)->destroy();
}
}
