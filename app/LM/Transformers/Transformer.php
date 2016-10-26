<?php

namespace App\LM\Transformers;

abstract class Transformer {
	
	public function transformCollection(array $profiles)
    	{
    		return array_map([$this, 'transform'], $profiles);
    	}

    public abstract function transform($profile);
}