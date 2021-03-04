<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    use HasFactory;

    protected $fillable = ['email', 'password', 'kbo_number', 'name', 'website', 'amount_proposals', 'profile_image'];

    public function proposal() {
        return $this->hasMany(Proposal::class);
    }
}
