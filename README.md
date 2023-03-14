# Cohere PHP Client

```php
include_once 'vendor/autoload.php';
const API_KEY = '------API_KEY------';

$config = (new \Cohere\Config('https://api.cohere.ai/v1/'))->setApiKey(API_KEY);
$client = new \Cohere\Client($config);

$response = $client->embed(['hello']);

var_dump($response);
```
