<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    protected $table = 'jadwaldiklats';
    protected $fillable  = ['timDiklat','regionalDiklat','namaDiklat','waktuDiklat','tempatDiklat','statusDiklat'];
}
