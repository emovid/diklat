<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $table = 'jadwalaudits';
    protected $fillable  = ['timAudit','regionalAudit','unitKerjaAudit','waktuMulaiAudit','waktuSelesaiAudit','keteranganAudit'];
}
