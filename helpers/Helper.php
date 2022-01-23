<?php

namespace helpers;

class Helper 
{
    /**
     * @param string $url
     * 
     * @return array
     */
    public static function getReq(string $url): array
    {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            $err = curl_error($ch);
            curl_close($ch);
            if (!$response || $err) {
                throw new \Exception($err);
            }
            return json_decode($response, true);
    }

    /**
     * @param string $url
     * @param array $body
     * @param array $headers
     * 
     * @return array
     */
    public static function postReq(string $url, array $body, array $headers):array
    {
        $toString = http_build_query($body);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_ENCODING, "");
            curl_setopt($ch, CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $toString); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response=curl_exec ($ch);
            $err = curl_error($ch);
            if (!$response || $err) {
                throw new \Exception($err);
            }
            curl_close($ch);
            return json_decode($response, true);
    }

}
