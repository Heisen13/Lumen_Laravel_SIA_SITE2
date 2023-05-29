<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserJob extends Model{

protected $table = 'courses';

protected $fillable = [
'Course_ID', 'Course_Name'
];

public $timestamps = false;
protected $primaryKey = 'Course_ID';

}