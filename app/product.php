<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use Searchable;
    public function searchableAs()
    {
        return 'keywords';
    }
}
