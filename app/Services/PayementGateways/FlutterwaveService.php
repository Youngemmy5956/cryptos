<?php

namespace App\Services\PayementGateways;

use App\Constants\CurrencyConstants;
use App\Exceptions\Wallet\FlutterWaveException;
use App\Services\Finance\UserTransactionService;

class FlutterwaveService
{
    private $curl_headers = [];
    private $defaultCustomization = [];
    public $customization = [];
    public $currency = "NGN";
    public $payment_option = "Card";
    public $meta_data = [];
    public $customer_data = [];

    public function __construct()
    {
        $this->defaultCustomization = [
            "title" => env("APP_NAME"),
            "description" => "Pay for service",
            "logo" => public_path("coininvest.png")
        ];
        $this->customization = $this->defaultCustomization;
        $this->curl_headers = [
            'accept: application/json',
            'content-type: application/json',
            "Authorization: Bearer " . env("FLUTTERWAVE_SECRET_KEY")
        ];
    }

    public function setCustomization($title = null, $description = null, $logo = null)
    {
        if (!blank($title)) {
            $this->customization["title"] = $title;
        }
        if (!blank($description)) {
            $this->customization["description"] = $description;
        }
        if (!blank($logo)) {
            $this->customization["logo"] = $logo;
        }
        return $this;
    }

    public function resetCustomization()
    {
        $this->customization = $this->defaultCustomization;
        return $this;
    }

    public function setCurrency(string $value)
    {
        if(!in_array($value , CurrencyConstants::FLUTTERWAVE_SUPPORTED_CURRENCIES)){
            throw new FlutterWaveException("$value is currently not supported by Flutterwave");
        }
        $this->currency = $value;
        return $this;
    }

    public function setPaymentOption(string $value)
    {
        $this->payment_option = $value;
        return $this;
    }

    public function setCustomerData(array $value)
    {
        $this->customer_data = $value;
        return $this;
    }
    public function setMetaData(array $value)
    {
        $this->meta_data = $value;
        return $this;
    }

    public function initialize(string $tx_ref, string $redirectUrl, float $amount)
    {

        $data = [
            "tx_ref" => $tx_ref,
            "amount" => $amount,
            "currency" => $this->currency,
            "redirect_url" => $redirectUrl,
            "payment_options" => "card",
            "meta" => $this->meta_data,
            "customer" => $this->customer_data,
            "customizations" => $this->customization
        ];

        if(empty($data["customer"])){
            throw new FlutterwaveException("Customer data is required");
        }

        if(empty($data["tx_ref"])){
            throw new FlutterwaveException("Transaction ref is required");
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => $this->curl_headers,
            CURLOPT_POSTFIELDS => json_encode($data)
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }

    public function verify(string $transaction_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$transaction_id/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => $this->curl_headers,
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }
}
