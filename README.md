# Client for Yodlee Api
## Easy way to get your Bank data

Don't worry, Be happy

## Installation

Install the latest version with

```bash
$ composer require shubinmi/yodlee-rest-api
```

## Basic Usage

```php
<?php

use YodleeRestApi\services\YodleeUserStory;
use YodleeRestApi\dto\config\YodleeConfig;

$yodleeConfig = new YodleeConfig();
$yodleeConfig->setApplicationId('081A2965D8CE7167777482996DA4600')
    ->setCobrandId('19910013777')
    ->setCobrandLogin('sandbox64')
    ->setCobrandPass('pass#777')
    ->setApiVersion('v1')
    ->setApiEndpoint('https://stage.api.yodlee.com/ysl/private-sandbox64/');

$userStory = new YodleeUserStory($yodleeConfig);

if (!$userExist = rand(0, 1)) {
    if (!$user = $userStory->create(
        'login', 'pass', 'email@email.com', 'Name'
    )) {
        echo json_encode($userStory->getErrors());
        die;
    }
} else {
    if (!$user = $userStory->login('login', 'pass')) {
        echo json_encode($userStory->getErrors());
        die;
    }
}
var_dump($user);
if (!$widget = $userStory->myFastLink()) {
    echo json_encode($userStory->getErrors());
    die;
}

echo '<form action="' . $widget->getUrl() . '" method="POST">';
foreach ($widget->getParameters() as $key => $value) {
    echo "<input type='hidden' name='{$key}' value='{$value}'>";
}
echo '<button value="Get Banks widget" type="submit"/>';
echo '</form>';

```