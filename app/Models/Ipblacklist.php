<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipblacklist extends Model
{
    use HasFactory;

    protected $fillable = ['ipaddress'];
}
