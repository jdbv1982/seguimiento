<?php namespace FollowUp\Repositories;

use DB;

use FollowUp\Entities\Region;


class RegionRepo extends BaseRepo{

	public function getModel(){
		return new Region;
	}



}
