<?php

namespace Model;

class Connection
{
    private $mysqli;

    private static $instance;


    private function __construct($host , $user , $pass , $db )
    {
        $this->mysqli = new \mysqli($host, $user, $pass, $db);
    }

    public function getMysqli()
    {
        return $this->mysqli;
    }


    public static function get()
    {
        if (is_null(Connection::$instance)) {
            Connection::$instance = new Connection('172.21.0.2', 'guest', 'guest', 'VSGA');
        }

        return Connection::$instance->getMysqli();
    }

    public static function close()
    {
        Connection::$instance->closeMysqli();
    }

    public function closeMysqli()
    {
        $this->mysqli->close();
        $this->mysqli = null;
    }
}
