<?php

namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class Portfolios
{
    protected $client = null;
    public $startIndex = 0;
    public $count = 10;
    public $campaignType = 'sponsoredProducts';

    /**
     * init
     */
    public function __construct()
    {        
        $Config = new Config();
        $this->client = new Client($Config->token);
        $this->client->profileId = $Config->profileId;
    }

    /**
     * listProfiles
     */
    public function listProfiles()
    {
        return $this->client->listProfiles();
    }

    /**
     * list
     */
    public function get()
    {
        $params = [
        ];
        return $this->client->listPortfolios($params);
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getPortfolio($id);
    }

    /**
     * update
     */
    public function update()
    {
        $data =[
            [
                "portfolioId" => 123456789,
                "name" => "My Portfolio New Name",
                "budget" => [
                    "amount" => 200.0,
                ]
            ],
            [
                "portfolioId" => 1234567890,
                "budget" => [
                    "amount" => 900.0,
                    "policy" => "dateRange",
                    "startDate"=> "20181201", 
                    "endDate" => "20190131"
                ]
            ]
        ];
        return $this->client->updatePortfolios($data);
    }

    /**
     * create
     */
    public function create()
    {
        $data = [
            [
                "name" => "My Portfolio One",
                "budget" => [
                    "amount" => 100.0,
                    "policy" => "dateRange",
                    "startDate" => date("Ymd"),
                    // "endDate" => "20190131",
                ],
                "state" => "enabled"
            ],
            [
                "name" => "My Portfolio Two",
                "budget" => [
                    "amount" => 50.0,
                    "policy" => "dateRange",
                    "startDate" => date("Ymd"),
                    // "endDate" => null
                ],
                "state" => "enabled"
            ]
        ];
        return $this->client->createPortfolios($data);
    }
}

// test
// ----------------------------------------------------------
$object = new Portfolios();
// $result = $object->show(272677100100447);
// $result = $object->create();
// $result = $object->get();
// $result = $object->update();
$result = $object->get();
print_r($result);
// ----------------------------------------------------------
