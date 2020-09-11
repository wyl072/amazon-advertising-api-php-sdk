<?php
namespace AmazonAdvertisingApi;

require_once "AmazonAdvertisingApi/Client.php";
require_once "Config.php";

class RegisterProfile {
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
     * register
     */
    public function register()
    {
        $data = [
            "countryCode" => "US"
        ];
        return $this->client->registerProfile($data);
    }
}

// test
// ----------------------------------------------------------
$object = new RegisterProfile();
// $result = $object->register();
$result = $object->listProfiles();
print_r($result);
// ----------------------------------------------------------