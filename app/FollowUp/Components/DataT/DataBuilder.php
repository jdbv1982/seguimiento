<?php namespace FollowUp\Components\DataT;

use Illuminate\View\Factory as View;
use Illuminate\Filesystem\Filesystem as File;

class DataBuilder{

	protected $view;
	protected $file;

	public function __construct(View $view, File $file){
		$this->view = $view;
		$this->file = $file;
	}

	public function buildDataTable(){
		if($this->file->exists('app/views/fields/dtable.blade.php')){
		            return 'fields/dtable';
		}
		return 'fields/dtable';
	}

	public function datatable($idTable, $headers = array(), $names = array(), $data = array(), $routeEdit = null){
		$template = $this->buildDataTable();

		return $this->view->make($template, compact('idTable','headers','names','data','routeEdit'));
	}
}
