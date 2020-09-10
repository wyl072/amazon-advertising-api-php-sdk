<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class ProductAds
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
            'count'        => $this->count,
            // 'campaignType' => $this->campaignType
        ];
        return $this->client->listProductAds($params);
    }

    /**
     * show
     */
    public function show($id)
    {
        return $this->client->getProductAdEx($id);
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
                "adGroupId" => 58659298385229,
                "sku" => "TEST004wwwww",
                "state" => "enabled"
            ],
            [
                "campaignId" => 13917328963398,
                "adGroupId" => 58659298385229,
                "sku" => "TEST005wwww",
                "state" => "enabled"
            ]
        ];
        return $this->client->createProductAds($data);
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
$object = new ProductAds();
// $result = $object->show(76066928749299);
$result = $object->create();
// $result = $object->get();
print_r($result);
// ----------------------------------------------------------