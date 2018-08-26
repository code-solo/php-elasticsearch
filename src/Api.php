<?php

namespace CodeSolo\Elasticsearch;

abstract class Api
{
    public static function doc(): Api\ApiDoc
    {
        return Api\ApiDoc::getInstance();
    }
}