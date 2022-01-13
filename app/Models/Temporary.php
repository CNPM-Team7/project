<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
    use HasFactory;

    protected $table = 'temporary';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'person_id',
        'type',
        'register_date',
        'start_date',
        'end_date',
        'reason',
        'family_id',
    ];

    public function declarant()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function stayAt()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }
}
