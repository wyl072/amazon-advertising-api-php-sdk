<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class ProductTargeting
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
        return $this->client->listTargetingClausesEx($params);
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getTargetingClauseEx($id);
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
                "campaignId" => 268028934405486,
                "adGroupId" => 198900927108961,
                "expressionType" => "manual",
                "expression" => [
                    "type" => "asinCategorySameAs",
                    "value" => "12345567"
                ],
                "bid" => 2,
                "state" => "enabled"
            ]
        ];
        return $this->client->createTargetingClauses($data);
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
$object = new ProductTargeting();
// $result = $object->show(76066928749299);
// $result = $object->get();
$result = $object->create();
print_r($result);
// ----------------------------------------------------------