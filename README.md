# ACCESS School System PHP Client API

This API provides a ready-to-use codes to integrate developments into the core data of ACCESS School Management System.

Basic Usage:
```
$Client = new ACCESS\Client(array(
   'application' => '', #name of system calling the request
    'school' => '', #SCHOOLNAMESETTINGS
    'key' => '', #API Key provided by school
    'hash' => '', #API has string provided by school
    'url' => 'https://api.accessphp.net/', #URL of the API specifically for the school
    'systemid' => '', #
    'debug' => false,
   ))
$Student = new ACCESS\Student('9504266');
$result = $Client->sendRequest($Student->getInfo());
```

