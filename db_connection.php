<?php


class DBConnection
{

    /**
     * @return PDO
     */
    public static function getConnection () {
        return new PDO('mysql:host=localhost;dbname=store', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}