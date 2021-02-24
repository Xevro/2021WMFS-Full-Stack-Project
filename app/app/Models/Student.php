<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'approved', 'preference_proposal', 'completed_days', 'mentor_id'];

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function traineeshipdays() {
        return $this->hasMany(Traineeship_day::class);
    }

    public function proposals() {
        return $this->belongsToMany(Proposal::class);
    }
}
