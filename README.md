# Laravel 5.x extended PostgreSQL driver

This project was inspired by features PostgreSQL supports and Laravel does not. Unfortunately, such features are not accepted in official repository (like [this one](https://github.com/laravel/framework/pull/9866)) and developers are told to use raw queries that is completely wrong solution in my opinion.

## Installation

TODO

## Features available

### UPSERT

UPSERT (INSERT ON CONFLICT UPDATE) is supported by PostgreSQL since version 9.5 and can be performed by calling
```php
Model::upsert($arrayOfAttibutes, $uniqueField)
```
Like original **insert** method **upsert** can manage multiple records.

### JSONB

TODO

### Various index types

TODO
