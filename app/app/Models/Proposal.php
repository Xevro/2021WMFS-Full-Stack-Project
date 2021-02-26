<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model {
    use HasFactory;

    protected $fillable = ['visibility', 'status', 'description', 'start_period', 'end_period', 'contract_file_location', 'amount_likes', 'company_id', 'mentor_id'];

    public function students() {
        return $this->hasMany(Student::class);
    }
    public function likes() {
        return $this->hasMany(Likes::class);
    }

    public function mentors() {
        return $this->belongsTo(Mentor::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
