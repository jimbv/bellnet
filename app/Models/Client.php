<?php 

namespace App\Models; 
use Illuminate\Database\Eloquent\Model;
 
class Client extends Model
{
 
    protected $fillable = [
        'name',
        'email',
        'phone',
        'active',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'subscriptions')
            ->withPivot([
                'start_date',
                'next_billing_date',
                'end_date',
                'agreed_price',
                'status',
            ]);
    }

}
