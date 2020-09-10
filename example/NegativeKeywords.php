<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class NegativeKeywords
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
        return $this->client->listNegativeKeywordsEx($params);
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getNegativeKeyword($id);
    }

    /**
     * update
     */
    public function update()
    {
    }

    /**
     * create
     */
    public function create()
    {
        $data = [
            [
                "campaignId" => 13917328963398,
                "adGroupId" => 192481916049278,
                "keywordText" => "Negative AnotherKeyword",
                "matchType" => "negativeExact",
                "state" => "enabled"
            ],
            [
                "campaignId" => 13917328963398,
                "adGroupId" => 192481916049278,
                "keywordText" => "Negative YetAnotherKeyword",
                "matchType" => "negativeExact",
                "state" => "enabled"
            ]
        ];
        return $this->client->createNegativeKeywords($data);
    }

    /**
     * delete
     */
    public function delete()
    {
    }
}

// test
// ----------------------------------------------------------
$object = new NegativeKeywords();
// $result = $object->show(76066928749299);
// $result = $object->get();
$result = $object->create();
print_r($result);
// ----------------------------------------------------------