# Status Messages

[![Total Downloads](https://img.shields.io/packagist/dt/bpartner/messages.svg?style=popout-square)](https://packagist.org/packages/bpartner/messages)
[![Latest Stable Version](https://img.shields.io/packagist/v/bpartner/messages.svg?style=popout-square)](https://packagist.org/packages/bpartner/messages)
[![PHP version](https://img.shields.io/packagist/php-v/bpartner/messages.svg?style=popout-square)](https://packagist.org/packages/bpartner/messages)
[![](https://img.shields.io/github/license/bpartner/messages.svg?style=popout-square)](https://github.com/bpartner/messages)

### Set status message for API (REST, ajax ...).

## Install with composer

```bash
$ composer require bpartner/messages
```

Get result for Rest API or ajax request

```json
{
    "status": "success",
    "message": "Record updated",
    "data": {
        "id": 123,
        "name": "Test name"       
    }
}
```

## Usage

Make status message

```php
   $result = Messages::make();
   or
   $result = Messages::make('Default success message'); 
```

Add metadata to response status message

```php
    $model = new Model();
    .....
    $result->addMeta($model);
```

Set Error Message

```php
    $result->setErrorMessage('Error message');
```

Get message

```php
    $result->get();
```

Response message in controller with HTTP (200|400) status

```php
    $result->result();
```
