<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Proposal extends Model {
    use HasFactory;

    protected $fillable = ['student_id', 'proposal_id'];

    public function student() {
        return $this->hasMany(Student::class);
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }
}
