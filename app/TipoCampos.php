<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TipoCampos extends Model
{
    use Sortable;
    public $sortable = ['idtcamp','tipos_campos','tipo_campo', 'created_at'];
    protected $table = 'tipos_campos';
    protected $primaryKey = 'idtcamp';
    public $timestamps = true;

    protected $guarded = ['idtcamp'];
}
