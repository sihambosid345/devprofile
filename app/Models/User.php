<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
use Notifiable;
protected $fillable = [
'name', 'email', 'password', 'title', 'bio', 'username',
];
public function projects()
{
return $this->hasMany(Project::class);
}
public function skills()
{
return $this->hasMany(Skill::class);
}
}