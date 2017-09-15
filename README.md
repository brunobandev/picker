# Picker

Picker is responsible for cutting and sending images to storage

### Lumen Installation

```sh
composer require bandev/picker
```

```sh
$ cp vendor/bandev/picker/src/config/picker.php config/
```

bootstrap/**app.php** uncomment the line:

```php
//$app->withFacades();
```

below add the line:
```php
$app->configure('picker');
```

and this:

```php
if (!class_exists('Picker')) {
    class_alias('Bandev\Picker\Facades\Picker', 'Picker');
}
```

and register the service provider:

```php
$app->register(Bandev\Picker\PickerServiceProvider::class);
```

add facade in controller:
```php
use Picker;
```

```php
$imageUrl = Picker::sendImage($request->image, $format = 'avatar', $resource = 'user', $resourceId = 1);
```
##### **DONE! ;)**
