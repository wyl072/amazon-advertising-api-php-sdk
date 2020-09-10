<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class Brands
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
     * show brand
     */
    public function getBrand($categoryId)
    {
        return $this->client->getBrandRecommendations($categoryId);
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
     * create exclude brand
     */
    public function createExcludeBrand()
    {
        $data = [
            [
                "campaignId"=> 268028934405486,
                "adGroupId"=> 6318131467271,
                // "targetId"=> 23652951218306,
                "expressionType"=> "manual",
                "expression"=> array(array(
                    "type"=> "asinBrandSameAs",
                    "value"=> 20286754011
                )),
                "state"=> "enabled"
            ]
        ];
        return $this->client->createNegativeTargetingClauses($data);
    }
}

// test
// ----------------------------------------------------------
$object = new Brands();
// $profiles = $object->listProfiles();
// print_r($profiles);
// exit;
// $result = $oAdGroups->show(272677100100447);
// $result = $object->show(76066928749299);
// $result = $object->get();
$result = $object->getBrand(array('categoryId'=>13400611));
// $result = $object->create();
// $result = $object->getTargeting();
print_r($result);
// ----------------------------------------------------------