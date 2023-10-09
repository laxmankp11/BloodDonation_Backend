<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use KyslikColumnSortableSortable;
use Illuminate\Database\Eloquent\Model;


class Web_User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='web_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'patient_name',
        'email',
        'password',
        'created_by_email',
        'phone_no',
        'blood_type',
        'address',
        'city',
        'state',
        'country',
        'profile_status',
        'status'
    ];
public $sortable = ['name','patient_name','email','created_by_email','phone_no','city','state','country','profile_status'];
}
