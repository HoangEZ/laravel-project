<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntryModel extends Model
{
    protected $table='entry';
    public $belong = [];
}
