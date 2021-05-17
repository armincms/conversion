<?php

namespace Armincms\Conversion;
 
use Armincms\Conversion\Contracts\Conversion as ConversionContracts;

abstract class Conversion implements ConversionContracts
{
    protected $schemas = [];

    /**
     * Register new schema.
     * 
     * @param  string $name  
     * @param  array  $config
     * @return $this        
     */
    public function schema(string $name, array $config)
    {
        $this->schemas[$name] = array_merge($this->defaults(), $config);

        return $this;
    }

    /**
     * Register new schema.
     * 
     * @param  string $name  
     * @param  array  $config
     * @return $this        
     */
    public function merge(string $name, array $config)
    {
        $this->schemas[$name] = array_merge($this->schemas[$name] ?? $this->defaults(), $config);

        return $this;
    }

    /**
     * Default schema configurations.
     * 
     * @return array
     */
    public function defaults()
    {
        return [   
            'width'         => 320,
            'height'        => 190,
            'upsize'        => false, // cutting type
            'compress'      => 25,
            'extension'     => null, // save extension
            'placeholder'   => $this->placeholder(320, 190),
            'label'         => null,
            'manipulations' => ['crop' => 'crop-center'], 
        ];
    }

    /**
     * Get the missing image plcaeholder.
     * 
     * @param  int $width  
     * @param  int $height 
     * @return string         
     */
    public function placeholder(int $width = 320, int $height = 320): string
    {
        return str_replace(
            ['WIDTH', 'HEIGHT', 'NAME'], 
            [$width, $height, config('app.name')],
            config('conversion.placeholder', 'http://via.placeholder.com/WIDTHxHEIGHT?text=NAME') 
        );
    }

    /**
     * Get the registered schemas.
     * 
     * @return array
     */
    public function schemas()
    {
        return $this->schemas;
    }
}
