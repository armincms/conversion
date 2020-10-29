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
            'compress'      => 75,
            'extension'     => null, // save extension
            'placeholder'   => imageholder(320, 190),
            'label'         => null,
            'manipulations' => ['crop' => 'crop-center'], 
        ];
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
