<?php

namespace Riettotek\FlashMsg;

class FlashMsg
{
    protected static function message($level, $message, $mobileMessage)
    {
        if (session()->has('messages')) {
            $messages = session()->pull('messages');
        }
        $messages[] = $message = ['level' => $level, 'message' => $message, 'mobile' => $mobileMessage];
        session()->flash('messages', $messages);
        return $message;
    }

    public static function success($message, $mobile = null)
    {
        return self::message('success', $message, $mobile ?? $message);
    }

    protected static function info($message, $mobile = null)
    {
        return self::message('info', $message, $mobile ?? $message);
    }

    protected static function warning($message, $mobile = null)
    {
        return self::message('warning', $message, $mobile ?? $message);
    }

    protected static function danger($message, $mobile = null)
    {
        return self::message('danger', $message, $mobile ?? $message);
    }

    public static function messages()
    {
        return self::hasMessages() ? session()->pull('messages') : [];
    }

    protected static function hasMessages()
    {
        return session()->has('messages');
    }
}
