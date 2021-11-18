<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestmodel extends Model
{
    use HasFactory;
    protected $table = 'requests';
    protected $fillable = ['product_id', 'token_id', 'ipaddress'];
}
