<?php
class Payment{

    public $name;
    public $email;
    public $amount;
    public $id;
    public $callback_url = 'dashboard/oop_project/xsales_ecommerce/index.php';

    public function curl_setopt($curl){
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.paystack.co/transaction/initialize',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode([
            'amount' => $this->amount * 100,
            'email' => $this->email,
            'callback_url' => $this->callback_url
        ]),
        CURLOPT_HTTPHEADER => [
            'authorization: Bearer sk_test_94a10f2392d877302889f3922fd8c06a263eeb7d',
            'content-type: application/json',
            'cache-control: no-cache'
    ],
    ));
}

public function curl_setoptcallbck($curl, $ref){
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.paystack.co/transaction/verify' . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'accept: application/json',
        'authorization: Bearer sk_test_94a10f2392d877302889f3922fd8c06a263eeb7d',
        'cache-control: no-cache'
],
));
}

}
?>