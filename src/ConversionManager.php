<?php

namespace Armincms\Conversion;

use Illuminate\Support\Manager; 
use Armincms\Conversion\Contracts\Conversion;

class ConversionManager extends Manager
{
    /**
     * Create a new driver instance.
     *
     * @param  string  $driver
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    protected function createDriver($driver)
    {
        return tap(parent::createDriver($driver), function($driver) {
            throw_unless($driver instanceof Conversion, \InvalidArgumentException::class, sprintf(
                'Conversion should be instance of [%s].', Conversion::class
            ));
        });
    }
    
    /**
     * Create common conversions driver.
     * 
     * @return \Armincms\Conversion\Contracts\Conversion
     */
    public function createCommonDriver()
    {
        return new CommonConversion;
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return 'common';
    }

    /**
     * Check if driver exists.
     * 
     * @param  string  $driver
     * @return boolean        
     */
    public function has($driver)
    {
        return method_exists($this, $driver) || isset($this->customCreators[$driver]);
    }

    /**
     * List the available drivers.
     *  
     * @return array        
     */
    public function conversions()
    {
        return with(array_keys($this->customCreators), function($drivers) {
            return array_merge($drivers, ['common']);
        }); 
    }
}
