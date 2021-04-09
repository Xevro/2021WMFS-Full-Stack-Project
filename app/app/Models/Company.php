<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    use HasFactory;

    protected $fillable = ['user_id', 'kbo_number', 'name', 'profile_image'];

    public function proposals() {
        return $this->hasMany(Proposal::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
