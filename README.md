# sessionFlashMessagesForLaravel
A good way to implement global alert messages in a laravel project


## Usage 
for example, in a controller you can call static methods (like `self::message()` or `self::info()`) as shown below.
```
FlashMsg::info('Just a plain message.');
FlashMsg::success('Item has been added.');
FlashMsg::warning('Service is currently under maintenance.');
FlashMsg::danger('An unknown error occured.');
```
## Install - How to patch in
1. run the command below
```
composer require riettotek/flashmsg
```

2. If dont have auto discover, paste this line within providers array in config/app.php
```
    Riettotek\FlashMsg\Providers\FlashMsgServiceProvider::class
```
3. Then include  the component for messages in your template, where u prefer
```
<x-flashmsg/>
```
## Customize the view
1. By the config file
2. By publishing the view component (be aware that u dont have another blade file named 'flashmsg.blade.php' in the component folder)
```
php artisan vendor:publish --provider="Riettotek\FlashMsg\Providers\FlashMsgServiceProvider"
```