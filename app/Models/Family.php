<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function members()
    {
        return $this->hasMany(Person::class);
    }

    public function owner()
    {
        return $this->belongsTo(Person::class, 'owner_id');
    }

    protected static function boot() {
        parent::boot();
    
        static::deleting(function($family) { 
            $family->members->each->update(['family_id' => null]);
        });
    }
}
