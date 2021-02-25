<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model {
    use HasFactory;

    protected $fillable = ['visibility', 'status', 'description', 'start_period', 'end_period', 'contract_file_location', 'amount_likes', 'companies_id_company', 'mentor_id'];

    public function students() {
        return $this->belongsToMany(Student::class);
    }

    public function mentors() {
        return $this->belongsTo(Mentor::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
