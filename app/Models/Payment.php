<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{   
    use HasFactory;


    protected $table = 'payments';
    protected $primarykey = 'id';
    protected $guarded = [];
    

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }


    public function creditTransaction($paymentAmount)
    {
        $transaction = $this->transaction;

        if ($transaction->total_amount >= $paymentAmount) {
            $transaction->total_amount -= $paymentAmount;

            if ($transaction->total_amount == 0) {
                $transaction->payment_status = 'Completed';
            } else {
                $transaction->payment_status = 'Partial';
            }

            $transaction->save();

            // Log the payment
            $this->amount = $paymentAmount;
            $this->payment_status = 'Completed'; // or 'Pending' based on your logic
            $this->save();

            return true;
        }

        return false;
    }


    public function debitTransaction($paymentAmount)
    {
        $transaction = $this->transaction;

        if ($transaction->total_amount >= $paymentAmount) {
            $transaction->total_amount += $paymentAmount;

            if ($transaction->total_amount == 0) {
                $transaction->payment_status = 'Completed';
            } else {
                $transaction->payment_status = 'Partial';
            }

            $transaction->save();

            // Log the payment
            $this->amount = $paymentAmount;
            $this->payment_status = 'Completed'; // or 'Pending' based on your logic
            $this->save();

            return true;
        }

        return false;
    }
}
