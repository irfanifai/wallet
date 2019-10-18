<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    public function deposit($value)
    {
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += $value;
        $deposit = $this->save();

        $history = auth()->user()->historie()->create([
            'type'         => 'I',
            'amount'       => $value,
            'total_before' => $totalBefore,
            'total_after'  => $this->amount,
            'date'         => date('Ymd'),
        ]);

        if($deposit && $history)
        {
            DB::commit();

            return [
                'success' => true,
                'message' => 'Success'
            ];

        } else {
            DB::rollback();

            return [
                'success' => false,
                'message' => 'Failed'
            ];

        }
    }

    public function transfer($value, User $sender): Array
    {
        if ($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Saldo Tidak Cukup'
            ];

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= $value;
        $transfer = $this->save();

        $history = auth()->user()->historie()->create([
            'type'         => 'T',
            'amount'       => $value,
            'total_before' => $totalBefore,
            'total_after'  => $this->amount,
            'date'         => date('Ymd'),
            'user_id_transaction' => $sender->id,
        ]);
        
        $senderBalance = $sender->balance()->firstOrCreate([]);
        $totalBeforeSender = $senderBalance->amount;
        $senderBalance->amount += $value;
        $transferSender = $senderBalance->save();

        $historySender = $sender->historie()->create([
            'type'                => 'T',
            'amount'              => $value,
            'total_before'        => $totalBeforeSender,
            'total_after'         => $senderBalance->amount,
            'date'                => date('Ymd'),
            'user_id_transaction' => auth()->user()->id,
        ]);

        if ($transfer && $history && $transferSender && $historySender) {
            DB::commit();

            return [
                'success' => true,
                'message' => 'Success transfer'
            ];
        }

        DB::rollback();

        return [
            'success' => false,
            'message' => 'Failed transfer'
        ];
    }

}