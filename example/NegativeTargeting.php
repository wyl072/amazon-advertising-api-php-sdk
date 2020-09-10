<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class NegativeTargeting
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
     * list
     */
    public function getTargeting()
    {
        return $this->client->listTargetingClausesEx(array('stateFilter'=>'enabled'));
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getNegativeKeyword($id);
    }

    /**
     * show brand
     */
    public function getBrand($categoryIds)
    {
        return $this->client->getBrandRecommendations($categoryIds);
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
        return $this->createExcludeBrand();
        // return $this->createExcludeProducts();
    }

    /**
     * create exclude products
     */
    public function createExcludeProducts()
    {
        $data = [
            [
                "campaignId"=> 268028934405486,
                "adGroupId"=> 6318131467271,
                // "targetId"=> 23652951218306,
                "expressionType"=> "manual",
                "expression"=> array(array(
                    "type"=> "asinSameAs",
                    "value"=> 'B00KMR3J7M'
                )),
                "state"=> "enabled"
            ]
        ];
        return $this->client->createNegativeTargetingClauses($data);
    }

    /**
     * create exclude brand
     */
    public function createExcludeBrand()
    {
        $data = [
            [
                "campaignId"=> 13917328963398,
                "adGroupId"=> 58659298385229,
                // "targetId"=> 23652951218306,
                "expressionType"=> "manual",
                "expression"=> array(array(
                    "type"=> "asinSameAs",
                    "value"=> 'B083GKL9DN'
                )),
                "state"=> "enabled"
            ]
        ];
        return $this->client->createNegativeTargetingClauses($data);
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
$object = new NegativeTargeting();
// $result = $object->show(76066928749299);
// $result = $object->get();
// $result = $object->create();
$result = $object->createExcludeBrand();
print_r($result);
// ----------------------------------------------------------