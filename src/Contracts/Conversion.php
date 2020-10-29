<?php 

namespace Armincms\Conversion\Contracts;


interface Conversion
{
	/**
	 * Register new schema.
	 * 
	 * @param  string $name  
	 * @param  array  $config
	 * @return $this        
	 */
	public function schema(string $name, array $config); 
}