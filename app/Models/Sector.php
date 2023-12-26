<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_sector_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'sector_id');
    }

    public function parentSector()
    {
        return $this->hasMany(Sector::class, 'parent_sector_id');
    }
}
