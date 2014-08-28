<?php namespace FollowUp\Managers;

abstract class BaseManager {

	protected $entity;
	protected $data;
	protected $errors;

	public function __construct($entity, $data){
		$this->entity = $entity;
		$this->data = $data;
	}

	abstract public function getRules();

	public function isValid(){
		$rules = $this->getRules();
		$validation = \Validator::make($this->prepareData($this->data), $rules);

		$isValid = $validation->passes();
		$this->errors =  $validation->messages();
		return $isValid;
	}

	public function save(){
		if( ! $this->isValid()){
			return false;
		}
		//dd($this->prepareData($this->data));
		$this->entity->fill($this->prepareData($this->data));
		$this->entity->save();

		return true;
	}

	public function getErrors(){
		return $this->errors;
	}

	 public function prepareData($data){
       		 return $data;
    	}

    	public function checkCampo($data, $campo){
    		if (! isset($data[$campo])) {
    			$data[$campo] = 0;
    		}elseif ($data[$campo] == 'on') {
    			$data[$campo] = 1;
    		}

    		return $data;
    	}
}
