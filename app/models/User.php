<?php

use Jenssegers\Mongodb\Model as Eloquent;

class User extends Eloquent {

    protected $collection = 'user';
		
		public $timestamps = false;

}