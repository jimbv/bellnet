<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'billing_cycle', 'base_price'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'subscriptions')
            ->withPivot([
                'start_date',
                'next_billing_date',
                'end_date',
                'agreed_price',
                'status',
            ]);
    }
}
