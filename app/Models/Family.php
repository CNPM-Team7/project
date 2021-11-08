<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Person;

class Family extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'owner_id',
        'house_id',
        'address',
        'update_content',
        'update_date',
    ];

    public function members(){
        return $this->hasMany(Person::class);
    }
}
