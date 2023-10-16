<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use KyslikColumnSortableSortable;

class Hospitals extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'hospital_type',
        'patient_name',
        'email',
        'password',
        'created_by_email',
        'phone_no',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'website',
        'contact_person_name',
        'contact_person_position',
        'contact_person_phone_no',
        'contact_person_email',
        'is_blood_bank',
        'license_no',
        'blood_donation_units_monthly',
        'hospital_partners_reason',
        'requirement_from_partenrship',
        'share_info_via_app',
        'cooperate_agree',
        'signature',
        'terms_agreement',
        'status'
    ];
public $sortable = ['name','email','created_by_email','phone_no','city','state','country','profile_status'];
}
