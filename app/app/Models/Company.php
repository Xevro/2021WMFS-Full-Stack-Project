<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    use HasFactory;

    protected $fillable = ['email', 'password', 'KBO_number', 'name', 'website'];

    public function proposal() {
        return $this->hasMany(Proposal::class);
    }
}
