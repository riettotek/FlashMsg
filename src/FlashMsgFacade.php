<?php

namespace Riettotek\FlashMsg;

use Illuminate\Support\Facades\Facade;

/**
 * @method info($message, $mobile_message = false)
 * @method warning($message, $mobile_message = false)
 * @method danger($message, $mobile_message = false)
 * @method success($message, $mobile_message = false)
 */
class FlashMsgFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FlashMsg::class;
    }
}
