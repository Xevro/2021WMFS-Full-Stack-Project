<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traineeship_day extends Model {
    use HasFactory;

    protected $fillable = ['date', 'student_id_student'];

    public function students() {
        return $this->belongsTo(Student::class);
    }
}
