<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function currencyExchanges()
    {
        $url = 'https://api.genelpara.com/embed/doviz.json';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // SSL sertifikasını doğrulama (gerektiğinde kullanın)
        $response = curl_exec($ch);

        if ($response !== false) {
            // İstek başarılı, response verilerini işleyin
            return json_decode($response, true);
        } else {
            // İstek başarısız, hata mesajını işleyin
            $error = curl_error($ch);
            echo 'API isteği başarısız! Hata: ' . $error;
        }

        curl_close($ch);

        /*$options = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => true,
                'allow_self_signed' => true,
                'cafile' => base_path('ca.crt'), // SSL sertifikası kök belirteci
            ),
        );

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        if ($response !== false) {
            // İstek başarılı, response verilerini işleyin
            var_dump($response);
        } else {
            // İstek başarısız, hata mesajını işleyin
            echo 'API isteği başarısız!';
        }*/
        //return json_decode('{"totalCount":1,"items":[{"Tarih":"08-06-2023","TP_DK_USD_S":"23.0625","TP_DK_USD_A":"23.021","TP_DK_EUR_S":"24.6692","TP_DK_EUR_A":"24.6248","TP_DK_GBP_S":"28.7345","TP_DK_GBP_A":"28.5854","UNIXTIME":{"$numberLong":"1686171600"}}]}', true);
    }
}
