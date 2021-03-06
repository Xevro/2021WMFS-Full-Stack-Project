<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'firstname', 'lastname', 'r_number', 'allowed', 'approved', 'proposal_id', 'completed_days', 'mentor_id'];

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function mentor() {
        return $this->belongsTo(Mentor::class);
    }

    public function likes() {
        return $this->belongsToMany(Like::class);
    }

    public function proposal() {
        return $this->belongsTo(Proposal::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
