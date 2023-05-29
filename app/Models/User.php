<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model{

protected $table = 'students';

protected $fillable = [
'Student_ID', 'Student_FName', 'Student_LName', 'Course_ID'
];

public $timestamps = false;
protected $primaryKey = 'Student_ID';

}