<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class AdGroups
{
    protected $client = null;
    public $startIndex = 0;
    public $count = 100;
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
            'count'        => $this->count,
            'campaignType' => $this->campaignType
        ];
        return $this->client->listAdGroups($params);
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getAdGroup($id);
    }

    /**
     * update
     */
    public function update()
    {
        return $this->client->updateAdGroups(
            [
                [
                    "adGroupId" => 198900927108961,
                    "state" => "enabled",
                    "defaultBid" => 0.34
                ]
            ]
        );
    }

    /**
     * create
     */
    public function create()
    {
        return $this->client->createAdGroups(
            [
                [
                    "campaignId" => 13917328963398,
                    "name" => "adgaaaxssssxx",
                    "state" => "enabled",
                    "defaultBid" =>6.01
                ],
                [
                    "campaignId" => 13917328963398,
                    "name" => "adgaaayyy",
                    "state" => "enabled",
                    "defaultBid" => 5.02
                ]
            ]
        );
    }
}

// test
// ----------------------------------------------------------
$object = new AdGroups();
// $result = $object->show(272677100100447);
$result = $object->create();
// $result = $object->update();
// $result = $object->get();
print_r($result);
// ----------------------------------------------------------
