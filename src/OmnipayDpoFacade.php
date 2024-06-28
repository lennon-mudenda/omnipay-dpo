<?php

namespace LennonMudenda\OmnipayDpo;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LennonMudenda\OmnipayDpo\Skeleton\SkeletonClass
 */
class OmnipayDpoFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'omnipay-dpo';
    }
}
