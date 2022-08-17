<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Program;

class Departments extends Model
{
    use HasFactory;

    protected $fillable = ['department_name'];

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}
