<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class configUIFondoLogin extends Model
{
    protected $table = 'config_ui_fondo_login';
    protected $primaryKey = 'fondo_id';
    protected $fillable = ['denominacion', 'slogan', 'path', 'path2x', 'activo'];
    public $timestamps = false;



    //
}
