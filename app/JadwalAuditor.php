<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalAuditor extends Model
{
    protected $table = 'jadwalauditors';
    protected $fillable  = ['idAuditor','timAuditor','regionalAuditor','namaKegiatan','waktuKegiatan','tempatKegiatan'];
}
