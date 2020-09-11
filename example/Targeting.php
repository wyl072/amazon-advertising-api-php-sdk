<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class Targeting
{
    protected $client = null;
    public $startIndex = 0;
    public $count = 1000;
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
        return $this->client->listTargetingClauses($params);
        // return $this->client->listNegativeKeywordsEx($params);
    }

    /**
     * update
     */
    public function update()
    {
        return $this->client->updateTargetingClauses(array(array(
            "campaignId"=> 13917328963398,
            "adGroupId"=> 58659298385229,
            "targetId"=> 218782597430838,
            "expressionType"=> "auto",
            "expression"=> [
                [
                "type"=> "queryBroadRelMatches" // specify the auto-targeting option you wish to adjust
                // note that no value should be specified
                ]
            ],
            "bid"=> 2, // you may also adjust the bid for this option
            "state"=> "enabled" // 
        )));
    }

    /**
     * create
     */
    public function create()
    {
        return $this->client->createTargetingClauses(array(array(
            "campaignId"=> 13917328963398,
            "adGroupId"=> 58659298385229,
            // "targetId"=> 218782597430838,
            "expressionType"=> "auto",
            "expression"=> [
                [
                "type"=> "queryBroadRelMatches" // specify the auto-targeting option you wish to adjust
                // note that no value should be specified
                ]
            ],
            "bid"=> 2, // you may also adjust the bid for this option
            "state"=> "enabled" // 
        )));
    }

    /**
     * create
     */
    public function create2()
    {
        $data = [
            [
                "campaignId"=> 188426599311545,
                "adGroupId"=> 277000965870007,
                "expressionType"=> "manual",
                "expression"=> [
                    [
                        "type"=> "asinSameAs",
                        "value"=> "B083NGKJZQ"
                    ]
                ],
                "bid"=> 10,
                "state"=> "enabled"
            ]
        ];
        return $this->client->createTargetingClauses($data);
        // return $this->client->createNegativeTargetingClauses($data);
    }

}

// test
// ----------------------------------------------------------
$object = new Targeting();
// $result = $object->get();
$result = $object->create();
// $result = $object->create2();
print_r($result);
// ----------------------------------------------------------