<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use KyslikColumnSortableSortable;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','status'
    ];
public $sortable = ['title','status'];
}
