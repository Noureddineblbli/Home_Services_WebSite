<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','cv','diploma','service_category_id'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservationsRejetees() 
    {
        return $this->belongsToMany('App\Models\Reservation', 'prestataire_reservation_rejetee', 'prestataire_id', 'reservation_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
