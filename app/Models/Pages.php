<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use KyslikColumnSortableSortable;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','status','url_route'
    ];
public $sortable = ['title','status','url_route'];
}
