<?php

namespace App\Enums; 

class AdditionalType 
{
    
    const COLOR = 'Color';
    const LUZ = 'Tipo de Luz';
    const DIMMER = 'Control remoto';
    const LARGO_CABLE = 'Largo del cable';

    public static function getTypes()
    {
        return [
            'COLOR' => self::COLOR,
            'LUZ' => self::LUZ,
            'DIMMER' => self::DIMMER,
            'LARGO_CABLE' => self::LARGO_CABLE,
        ];
    }
}