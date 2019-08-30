<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class UsuariosWeb extends Model
{
	    use Sortable;
    public $guarded = [];
            public $sortable = ['idusr'];
    protected $table = 'usuarios';
    public $timestamps = false;
    protected $primaryKey = 'idusr';
}
