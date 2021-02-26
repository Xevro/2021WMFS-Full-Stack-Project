<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model {
    use HasFactory;

    protected $fillable = ['student_id', 'proposal_id'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }
}
