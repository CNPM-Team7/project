<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Person;

class Declairation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'person_id',
        'status',
        'test_result',
        'test_date',
    ];

    public function declairant(){
        return $this->belongsTo(Person::class);
    }
}
