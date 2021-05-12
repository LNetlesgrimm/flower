<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ORM to transform the data to objects
// Eloquent is the ORM of Laravel

class Flower extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'type', 'poster'];


    public function getPriceSymbolAttribute($price) {
        return $this->price . ' $';
    }

    public function getCreatedAtAttribute($date) {
        return date('d F Y', strtotime($date));
    }

    // one to many relationship, a comment belongs only to ONE flower
    // a flower can have MANY comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
