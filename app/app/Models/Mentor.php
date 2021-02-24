<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model {
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'student_name'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }
}
