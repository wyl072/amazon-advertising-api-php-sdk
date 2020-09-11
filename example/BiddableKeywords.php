<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class BiddableKeywords
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
        return $this->client->listBiddableKeywords($params);
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getBiddableKeywordEx($id);
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
                "campaignId"=> 13917328963398,
                "adGroupId"=> 58659298385229,
                "keywordText" => "ssssss",
                "matchType" => "exact",
                "state" => "enabled"
            ],
            [
                "campaignId"=> 138377516705077,
                "adGroupId"=> 267142055791236,
                "keywordText" => "testwwwwwsx",
                "matchType" => "exact",
                "state" => "enabled"
            ]
        ];
        return $this->client->createKeywords($data);
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
$object = new BiddableKeywords();
// $result = $oAdGroups->show(272677100100447);
// $result = $object->show(76066928749299);
$result = $object->get();
// $result = $object->create();
print_r($result);
// ----------------------------------------------------------