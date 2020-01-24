<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Campos extends Model
{
    use Sortable;
    public $sortable = ['idcamp', 'created_at'];
    protected $table = 'campos';
    protected $primaryKey = 'idcamp';
    public $timestamps = true;

    protected $fillable = [
        'idcamp', 'idtcamp','campo_descripcion', 'campo_titulo', 'campo_valores', 'created_at', 'updated_at'];
}
