<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Program;


class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $fillable = [
        'user_name',
        'first_name',
        'middle_name',
        'last_name',
        'national_id',
        'email',
        'phone',
        'department_id',
        'program_id',
        'admissionNumber',
        'yearOfAdmission',
        'guardianPhone',
    ];

    public function programs()
    {
        return $this->belongsTo(Program::class);
    }
}
