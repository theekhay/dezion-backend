<?php

namespace App\Modules\Notify\Vendors;

use App\Modules\Notify\Concerns\INotify;
use App\Modules\Notify\Traits\SmsTrait;
use App\Modules\Notify\Concerns\ICheckBalance;

Class SmartSms implements INotify, ICheckBalance{


    private const API_KEY = "knnodnsnkwnsnosnosnosno";

    private const BASE_URL = "http://api.smartsmssolutions.com/smsapi.php?";

    private $username;

    private $password;

    private $sender;



    public function __construct()
    {
       // $this->username = 'ojo_tokunbo2002@yahoo.com';
       // $this->password = 'Tokunbo@123';

        $this->username = 'care@harvestersng.org';
        $this->password = 'membership';
        $this->sender = "test";
        $this->builder  = self::BASE_URL."username=" .$this->username. "&password=" .$this->password. "&sender=" .$this->sender;
    }



    public function checkBalance()
    {

    }


    public function send( String $message, String $recipients )
    {
        if( ! empty( $recepients ) )
        {
            $query = $this->builder. "&recipient=" .$recipients ."&message=".$message;
           // $recepientsString = $this->recepientsToString( $recepients );
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $query,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    // Set Here Your Requesred Headers
                    'Content-Type: application/json',
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            // if ($err) {
            //     echo "cURL Error #:" . $err;
            // } else {
            //     print_r(json_decode($response));
            // }
            //         }
            //     }

            echo json_encode(['resp' => $response, 'query' => $query]); die;
        }
    }







    public function log()
    {
        return "logged";
    }



}
