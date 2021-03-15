<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mentor extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = ['user_id', 'firstname', 'lastname', 'email', 'password'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
