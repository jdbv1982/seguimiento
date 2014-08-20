<?php namespace FollowUp\Entities;

use FollowUp\Entities\User;

class Permiso extends \Eloquent {

	protected $fillable = ['user_id','permiso_id','visible'];
	protected $table = 'permiso_user';


}
