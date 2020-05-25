<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FakePostModel extends Model
{
	/**
	 * Table Name
	 * @var string
	 */
    protected $table = 'post';

	/**
	 * fillable Columns
	 * @var array
	 */
    protected $fillable = [
    	'post_name',
	    'description'
    ];

	/**
	 * TimeStamp Colums
	 * @var array
	 */
    protected $dates = [
    	'created_at',
	    'updated_at'
    ];

}
