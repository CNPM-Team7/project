<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
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

    public function declarant()
    {
        return $this->belongsTo(Person::class);
    }
}
