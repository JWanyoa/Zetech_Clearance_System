<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Departments;
use App\Models\Student;



class Program extends Model
{
    use HasFactory;

    protected $primaryKey = 'program_id';

    protected $fillable = [
        'program_name',
        'program_code',
        'program_type',
        'department_id',
    ];

    public function departments()
    {
        return $this->belongsTo(Departments::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
