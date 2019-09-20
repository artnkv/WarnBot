<?php


class Handler
{
    public static function getEvent()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    public static function ok(){
        echo 'ok';
        return;
    }

}