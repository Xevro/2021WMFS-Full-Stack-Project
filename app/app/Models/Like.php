<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model {
    use HasFactory;

    protected $fillable = ['student_id', 'proposal_id'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function proposal() {
        return $this->belongsTo(Proposal::class);
    }
}
