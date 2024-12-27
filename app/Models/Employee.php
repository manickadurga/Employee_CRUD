<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
     protected $fillable = [
          'reg_no',
          'emp_name',
          'email',
          'contact',
      ];
    use HasFactory;
}
