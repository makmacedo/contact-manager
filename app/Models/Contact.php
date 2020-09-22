<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'title',
        'phone',
        'mobile',
        'email',
        'company_id',
        'notes',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
