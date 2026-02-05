<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class SubscriptionPaymentService
{
    public function pay(Subscription $subscription, array $data): Payment
    {
        return DB::transaction(function () use ($subscription, $data) {

            // 1️⃣ Registrar pago
            $payment = Payment::create([
                'subscription_id' => $subscription->id,
                'paid_at' => $data['paid_at'] ?? now(),
                'amount' => $data['amount'],
                'method' => $data['method'] ?? 'cash',
                'notes'  => $data['notes'] ?? null,
            ]);

            // 2️⃣ Calcular próxima fecha
            $nextDate = match ($subscription->service->billing_cycle) {
                'monthly' => $subscription->next_billing_date->addMonth(),
                'yearly'  => $subscription->next_billing_date->addYear(),
            };

            // 3️⃣ Actualizar suscripción
            $subscription->update([
                'next_billing_date' => $nextDate,
                'status' => 'active',
            ]);

            return $payment;
        });
    }
}
