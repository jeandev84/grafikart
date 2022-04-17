<?php


/**
 * @OpenWeather
*/
class OpenWeather
{


       /**
        * @var string
       */
       private $apiKey;



       /**
        * OpenWeather constructor
        *
        * @param string $apiKey
       */
       public function __construct(string $apiKey)
       {
            $this->apiKey = $apiKey;
       }


       /**
         * @param string $city
         * @return array
         * @throws Exception
       */
       public function getToday(string $city)
       {
            $data = $this->callAPI("weather?q={$city}");

            return [
                'temp'        => $data['main']['temp'],
                'description' => $data['weather'][0]['description'],
                'date'        => new DateTime()
            ];
       }



       /**
        * Get forecast
        *
        * @param string $city
        * @return null|array
        * @throws Exception
       */
       public function getForecast(string $city): ?array
       {
            $data = $this->callAPI("forecast?q={$city}");

            foreach ($data['list'] as $day) {
                $results[] = [
                    'temp'        => $day['main']['temp'],
                    'description' => $day['weather'][0]['description'],
                    'date'        => new DateTime('@'. $day['dt'])
                ];
            }

            return $results;
       }



      /**
        * @param string $endpoint
        * @return array|null
        * @throws Exception
       */
       private function callAPI(string $endpoint): ?array
       {
           $curl = curl_init("https://api.openweathermap.org/data/2.5/{$endpoint}&appid={$this->apiKey}&units=metric&lang=fr");

           curl_setopt_array($curl, [
               CURLOPT_RETURNTRANSFER  => true,
               CURLOPT_CAINFO          => realpath(dirname(__DIR__) .'/certificates/firefox.crt') ,
               CURLOPT_TIMEOUT         => 1 // permet de dire au server si en 1 second pas de resultat alors abandone
           ]);

           $data = curl_exec($curl);

           $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

           if ($data === false || $statusCode !== 200) {
               return null;
           }


           return json_decode($data, true);
       }
}