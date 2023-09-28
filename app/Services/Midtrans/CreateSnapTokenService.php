<?php

namespace App\Services\Midtrans;

use App\Services\Midtrans\Midtrans;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->order->number,
                'gross_amount' => $this->order->total_price,
            ],
            'item_details' => [
                [
                    'id' => $this->order->id,
                    'price' => $this->order->harga_satuan,
                    'quantity' => $this->order->jumlah,
                    'name' => $this->order->kategori_tiket,
                ]
            ],
            'customer_details' => [
                'first_name' => $this->order->konser->user->name,
                'email' => $this->order->konser->user->email,
                'phone' => $this->order->konser->user->phone,
            ]
        ];


        $snapToken = Snap::getSnapToken($params);
        return $snapToken;

    }
}