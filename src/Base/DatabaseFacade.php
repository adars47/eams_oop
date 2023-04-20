<?php

namespace App\Base;

class DatabaseFacade
{
    private static Database $database_context;
    private static QueryLogger $queryLogger;
    private static DatabaseDeleteMonitor $databaseDeleteMonitor;

    public function __construct()
    {
        self::$database_context = new Database();
        self::$queryLogger= new QueryLogger();
        self::$databaseDeleteMonitor = new DatabaseDeleteMonitor();
        self::$database_context->subscribe(self::$queryLogger);
        self::$database_context->subscribe(self::$databaseDeleteMonitor);
    }

    public static function getDatabaseContext(): Database
    {
        return self::$database_context;
    }

}