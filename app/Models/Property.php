<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(PropertyImages::class);
    }

    public function delete()
    {
        foreach ($this->images as $img) {
            Storage::disk('public')->delete('properties/image/' . $img->name);
        }
        $this->images()->delete();
        parent::delete();
    }

    public function location()
    {
        return $this->hasOne(PropertyLocation::class, 'id', 'location_id');
    }
}
