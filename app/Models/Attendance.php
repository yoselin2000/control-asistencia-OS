<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id', 'user_name', 'marked_at', 'left_at', 'user_ip'];
}