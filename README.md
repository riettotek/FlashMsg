# sessionFlashMessagesForLaravel
A good way to implement global alert messages in a laravel project


## Usage 
In a controller you can call static methods shown below.
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
3. Render the messages. You can do it in three different ways:
  - with this directive. U can customize the markup html in the config/flashmsg.php file
```
 @alertsmsg
```
you got to publish the config file with this command:
```
php artisan vendor:publish --provider="Riettotek\FlashMsg\Providers\FlashMsgServiceProvider" --tag=config
```
  - via facade already autoloaded u can store the messages in a variable  and then loop through that
  ```
  {{ $alerts = FlashMsg::messages() }}
  ```
  - Publish the blade component in your project components folder
```
php artisan vendor:publish --provider="Riettotek\FlashMsg\Providers\FlashMsgServiceProvider" --tag=view
```
then use that like so:
```
<x-renderalerts/>
```
By publishing the view component (be aware that u dont have another blade file named 'alertsmsg.blade.php' in the component folder)