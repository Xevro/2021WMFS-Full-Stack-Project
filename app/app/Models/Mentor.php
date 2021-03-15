<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'firstname', 'lastname', 'email'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
