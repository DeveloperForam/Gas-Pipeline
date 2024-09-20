<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'name', 'type', 'distance', 'owner_name', 'address', 'is_active'
    ];

    public function connectedProperties()
    {
        return $this->belongsToMany(Property::class, 'connections', 'property_id', 'connected_property_id')
                    ->withPivot('distance');
    }
}
