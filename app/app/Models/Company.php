<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = ['email', 'password', 'kbo_number', 'name', 'amount_proposals', 'profile_image'];

    public function proposal() {
        return $this->hasMany(Proposal::class);
    }
}
