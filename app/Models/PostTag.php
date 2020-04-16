<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_tags';

    protected $guarded = [];
}
