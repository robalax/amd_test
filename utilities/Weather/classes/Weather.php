<?php 

namespace utilities\Weather\classes;
use utilities\Weather\interfaces\WeatherInterface;
use helpers\Helper;
use constents\Config;

class Weather  implements WeatherInterface
{

    public function __construct(){}

    /**
     * @param string $city
     * 
     * @return string
     */
    public function getCurrentTemperature(string $city):string
    {
        $temperature = "";
        $appId = Config::WEATHER_API_KEY;
        $url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid='.$appId.'&units=metric';
        $response = Helper::getReq($url);
        if (count($response) > 0) {
            $temperature = $response['main']["temp"];
        }
        return $temperature;
    }
}
