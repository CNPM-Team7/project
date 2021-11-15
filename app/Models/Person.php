<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'people';

    protected $fillable = [
        'name',
        'birthday',
        'birth_place',
        'sex',
        'job',
        'work_place',
        'id_number',
        'idn_receive_place',
        'idn_receive_date',
        'register_place',
        'register_date',
        'owner_relation',
        'status',
        'family_id',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function declairations()
    {
        return $this->hasMany(Declairation::class);
    }
}
