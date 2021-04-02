<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model {
    use HasFactory;

    protected $fillable = ['visibility', 'status', 'description', 'start_period', 'end_period', 'contract_file_location', 'company_id'];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
