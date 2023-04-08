# Cohere PHP Client

```php
include_once 'vendor/autoload.php';
const API_KEY = '------API_KEY------';

$config = (new \Cohere\Config(API_KEY));
$client = new \Cohere\Client($config);

$response = $client->embed(['hello']);

var_dump($response);
```
