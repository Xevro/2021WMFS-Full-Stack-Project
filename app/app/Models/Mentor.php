<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mentor extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = ['firstname', 'lastname', 'email', 'password'];
    protected $hidden = [''];
    public function students() {
        return $this->hasMany(Student::class);
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }
}
