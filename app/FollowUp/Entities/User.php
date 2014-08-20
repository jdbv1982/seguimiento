<?php namespace FollowUp\Entities;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use DB;


class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = array('full_name','email','password');

	public function setPasswordAttribute($value){
		$this->attributes['password'] = \Hash::make($value);
	}

	public function permisos()
	{
	        return $this->belongsToMany("FollowUp\Entities\Permiso")->withPivot('permiso_id');
	}

	public function verificaPermiso($id, $permiso_id){
		$permiso = DB::table('permiso_user')
			->where('user_id','=',$id)
			->where('permiso_id','=',$permiso_id,'AND')
			->where('visible','=',1,'AND')
			->get();


		if(empty($permiso)){
			return 'false';
		}

		return 'true';
	}


}
