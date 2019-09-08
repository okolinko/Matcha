<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 25.08.2019
 * Time: 00:26
 */

namespace Config;


class config
{
    public $DB_HOST;
    public $DB_DSN;
    public $DB_USER;
    public $DB_PASSWORD;
    public function __construct()
    {
        $this->DB_HOST = "localhost";
        $this->DB_DSN = "matcha";
        $this->DB_USER = "root";
        $this->DB_PASSWORD = "";
    }
}