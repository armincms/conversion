<?php

namespace Armincms\Conversion;
 

class CommonConversion extends Conversion
{ 
    /**
     * Get the registered schemas.
     * 
     * @return array
     */
    public function schemas()
    {
        return array_merge([
            'main' => [   
                'width'         => 768,
                'height'        => 400, 
                'upsize'        => false, // cutting type
                'compress'      => 75,
                'extension'     => null, // save extension
                'placeholder'   => image_placeholder(768, 400),
                'label'         => __('Common larg image'),
            ],
            'thumbnail' => [  
                'width'         => 320,
                'height'        => 217, 
                'upsize'        => false, // cutting type
                'compress'      => 75,
                'extension'     => null, // save extension
                'placeholder'   => image_placeholder(320, 217),
                'label'         => __('Common thumbnail image'),
            ], 
        ], parent::schemas());
    }
}
