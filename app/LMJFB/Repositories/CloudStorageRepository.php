<?php namespace LMJFB\Repositories;

use Yandex\Disk\DiskClient;

class CloudStorageRepository {

    protected $ACCESS_TOKEN = 'AQAAAAANB5UsAAQbu-9zc5pyD0YAln8WW8aX4yM';
    private $disk;

    public function __construct(DiskClient $diskclt){
        $this->disk =  $diskclt;
        $this->disk->setAccessToken(ACCESS_TOKEN);
    }

}


    
