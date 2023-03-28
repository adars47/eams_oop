<?php

namespace App\Base;

//should this class be a singleton? i will decide later
use App\Exceptions\DatabaseConnectionException;

class Database implements Observable
{

    private static $connection;

    /**
     * @throws DatabaseConnectionException
     */
    public function __construct()
    {
        self::$connection = mysqli_connect($_ENV['database_url'],$_ENV['database_user'],$_ENV['database_password'],$_ENV['database_name']);
        if (!self::$connection) {
            throw new DatabaseConnectionException();
//            echo mysqli_connect_errno() . ":" . mysqli_connect_error();
//            exit;
        }

    }

    public function getConnection()
    {
        return self::$connection;
    }

    public function execute($query)
    {
        $this->notifyObservers($query);
        return self::$connection->query($query);

    }

    private $observers = [];

    public function subscribe($object)
    {
        $this->observers[spl_object_hash($object)]=$object;
    }

    public function unsubscribe($object)
    {
        unset($this->observers[spl_object_hash($object)]);
    }

    private function notifyObservers(string $query)
    {
        foreach($this->observers as $observer)
        {
            $observer->notify($query);
        }
    }

}