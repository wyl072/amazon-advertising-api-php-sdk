<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class Categories
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
     * show categories
     */
    public function show($asins)
    {
        return $this->client->getTargetingCategories($asins);
    }

}

// test
// ----------------------------------------------------------
$object = new Categories();
// $result = $object->show(array());
// $result = $object->get();
// $result = $object->create();
print_r($result);
// ----------------------------------------------------------