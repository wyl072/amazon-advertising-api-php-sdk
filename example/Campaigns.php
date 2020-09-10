<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class Campaigns
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
     * list
     */
    public function get()
    {
        $params = [
            'startIndex'   => $this->startIndex,
            'count'        => $this->count
        ];
        return $this->client->listCampaigns($params);
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getCampaign($id);
    }

    /**
     * update
     */
    public function update()
    {
        $data = [
            [
                'portfolioId' => 37055484852902,
                "campaignId" => 21923972975338,
                "name" => "My Campaign 08192222",
                "campaignType" => "sponsoredProducts",
                "targetingType" => "manual",
                "state" => "enabled",
                "dailyBudget" => 1.08,
                "startDate" => date("Ymd")
            ]
        ];
        return $this->client->updateCampaigns($data);
    }

    /**
     * create
     */
    public function create()
    {
        $data = [
            [
                "name" => "My Campaign 0903-1",
                "campaignType" => "sponsoredProducts",
                "targetingType" => "auto",
                "state" => "enabled",
                "dailyBudget" => 1.01,
                "startDate" => date("Ymd")
            ],
            [
                "name" => "My Campaign 0903-2",
                "campaignType" => "sponsoredProducts",
                "targetingType" => "auto",
                "state" => "enabled",
                "dailyBudget" => 1.02,
                "startDate" => date("Ymd")
            ]
        ];
        return $this->client->createCampaigns($data);
    }
}

// test
// ----------------------------------------------------------
$object = new Campaigns();
// $result = $object->show(272677100100447);
$result = $object->create();
// $result = $object->get();
// $result = $object->update();
print_r($result);
// ----------------------------------------------------------
