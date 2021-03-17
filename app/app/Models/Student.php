<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'firstname', 'lastname', 'r_number', 'allowed', 'email', 'approved', 'proposal_id', 'completed_days', 'mentor_id'];

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function traineeshipdays() {
        return $this->hasMany(Traineeship_day::class);
    }

    public function mentor() {
        return $this->belongsTo(Mentor::class);
    }

    public function proposals() {
        return $this->belongsTo(Proposal::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
