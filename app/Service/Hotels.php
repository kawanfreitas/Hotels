<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Response;

class Hotels
{
    const BASE_URL = 'https://buzzvel-interviews.s3.eu-west-1.amazonaws.com/hotels.json';
    /**
     * @var
     */
    protected $url;
    /**
     * @var
     */
    protected $data;
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return false|string
     */
    public function getData()
    {
        return $this->doRequest(self::BASE_URL);
    }

    /**
     * Do API request with provided params
     *
     * @param string $uriEndpoint
     * @param array $params
     * @param string $requestMethod
     *
     */
    private function doRequest(string $uriEndpoint, string $requestMethod = 'GET', array  $params = [])
    {
        try {
            /** @var Response $response */
            $response = $this->client->request(
                $requestMethod,
                $uriEndpoint,
                $params
            );
            return $response->getBody()->getContents();
        } catch (GuzzleException $exception) {
            return json_encode([
                    "success" => false,
                    "message" => $exception->getMessage()
                ]
            );
        }
    }
}
