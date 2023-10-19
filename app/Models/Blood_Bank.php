<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use KyslikColumnSortableSortable;

class Blood_Bank extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
        protected $table='blood_banks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_by_email',
        'phone_no',
        'blood_type',
        'address',
        'city',
        'state',
        'country',
        'status',
        'profile_status',
        'landline_no',
        'username',
    ];
public $sortable = ['name','email','created_by_email','phone_no','city','state','country','status','profile_status'];
}
