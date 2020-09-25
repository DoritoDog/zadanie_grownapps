<?php

namespace App;

interface iDB
{
    public function queryAndFetch($statement);
}