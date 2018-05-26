# JSON Helper Library
This library throws an exception every time a json encode/decode action fails.

## Install
Using Composer
```
"require": {
    "codedgr/json": "~1.0"
}
```
## Usage
Define an array
```
$array = [
    'first-element' => 'this value',
    'second-element' => [0,1,2,3,4],
];
```
Then use the `encode` and `decode` functions surrounded with try/catch
```
try{
    $encodedJSON = JSON::encode($array);
    $object = JSON::decode($encodedJSON);
}catch (JSONException $e){
    echo $e->getMessage();
}
```

## Requirements
- PHP 7.1 or above