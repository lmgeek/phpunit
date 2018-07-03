<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    public function add($user) {
        $this->guardAgainstTooManyMembers();

        $method = $user instanceof User ? 'save' : 'saveMany';

        $this->members()->$method($user);
    }

    public function members() {
        return $this->hasMany(User::class);
    }

    public function count() {
        return $this->members()->count();
    }

    public function remove($users = null) {
        if ($users instanceof User) {
            return $users->leaveTeam();
        }
        $this->members()
            ->whereIn('id', $users->pluck('id'))
            ->update(['team_id' => null]);
    }

    public function restart() {
        $this->members()->update(['team_id' => null]);
    }

    protected function guardAgainstTooManyMembers() {
        if ($this->count() >= $this->size) {
            throw new \Exception;
        }
    }
}
