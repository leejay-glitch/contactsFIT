<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }
}