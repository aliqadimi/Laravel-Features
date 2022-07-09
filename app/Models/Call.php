<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function contact()
    {
        return $this->belongsToMany(Contact::class);
    }

}
