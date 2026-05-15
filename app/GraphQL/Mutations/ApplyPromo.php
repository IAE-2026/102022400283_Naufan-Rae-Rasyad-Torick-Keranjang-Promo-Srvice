<?php

namespace App\GraphQL\Mutations;

use App\Models\Promo;
use Carbon\Carbon;

final class ApplyPromo
{
    public function __invoke($_, array $args): array
    {
        $promo = Promo::where('code', $args['code'])->first();

        if (!$promo) {
            return [
                'status' => 'error',
                'message' => 'Promo tidak ditemukan',
            ];
        }

        if ($promo->expired_at < Carbon::now()) {
            return [
                'status' => 'error',
                'message' => 'Promo expired',
            ];
        }

        if ($args['total_price'] < $promo->minimum_transaction) {
            return [
                'status' => 'error',
                'message' => 'Minimum transaksi belum memenuhi',
            ];
        }

        if ($promo->used >= $promo->max_usage) {
            return [
                'status' => 'error',
                'message' => 'Kuota promo habis',
            ];
        }

        $discount = $args['total_price'] * ($promo->discount_percent / 100);
        $promo->increment('used');

        return [
            'status' => 'success',
            'promo_code' => $promo->code,
            'discount' => $discount,
            'final_total' => $args['total_price'] - $discount,
        ];
    }
}