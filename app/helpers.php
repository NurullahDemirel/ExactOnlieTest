<?php

use Picqer\Financials\Exact\Connection;

function getValue($key)
{
    $storage = json_decode(file_get_contents('storage.json'), true);
    if (array_key_exists($key, $storage)) {
        return $storage[$key];
    }
}


function setValue($key, $value)
{
    $storage = json_decode(file_get_contents('storage.json'), true);
    $storage[$key] = $value;
    file_put_contents('storage.json', json_encode($storage));
}
//
//
//function authorize()
//{
//    $connection = new \Picqer\Financials\Exact\Connection();
//    $connection->setRedirectUrl('__REDIRECT_URL__');
//    $connection->setExactClientId('__CLIENT_ID__');
//    $connection->setExactClientSecret('__CLIENT_SECRET__');
//    $connection->redirectForAuthorization();
//}
//
//function tokenUpdateCallback(Connection $connection)
//{
//    // Save the new tokens for next connections
//    setValue('accesstoken', $connection->getAccessToken());
//    setValue('refreshtoken', $connection->getRefreshToken());
//
//    // Save expires time for next connections
//    setValue('expires_in', $connection->getTokenExpires());
//}
//
function connect()
{
    $connection = new Connection();
    $connection->setRedirectUrl('__REDIRECT_URL__');
    $connection->setExactClientId('__CLIENT_ID__');
    $connection->setExactClientSecret('__CLIENT_SECRET__');

    // Retrieves authorizationcode from database
    if (getValue('authorizationcode')) {
        $connection->setAuthorizationCode(getValue('authorizationcode'));
    }

    // Retrieves accesstoken from database
    if (getValue('accesstoken')) {
        $connection->setAccessToken(getValue('accesstoken'));
    }

    // Retrieves refreshtoken from database
    if (getValue('refreshtoken')) {
        $connection->setRefreshToken(getValue('refreshtoken'));
    }

    // Retrieves expires timestamp from database
    if (getValue('expires_in')) {
        $connection->setTokenExpires(getValue('expires_in'));
    }

    // Set callback to save newly generated tokens
    $connection->setTokenUpdateCallback('tokenUpdateCallback');

    // Make the client connect and exchange tokens
    try {
        $connection->connect();
    } catch (\Exception $e) {
        throw new Exception('Could not connect to Exact: ' . $e->getMessage());
    }

    return $connection;
}
//
//// If authorization code is returned from Exact, save this to use for token request
//if (isset($_GET['code']) && is_null(getValue('authorizationcode'))) {
//    setValue('authorizationcode', $_GET['code']);
//}
//
//// If we do not have a authorization code, authorize first to setup tokens
//if (getValue('authorizationcode') === null) {
//    authorize();
//}
//
//// Create the Exact client
//$connection = connect();
//
//// Get the journals from our administration
//try {
//    $journals = new \Picqer\Financials\Exact\Journal($connection);
//    $result = $journals->get();
//    foreach ($result as $journal) {
//        echo 'Journal: ' . $journal->Description . '<br>';
//    }
//} catch (\Exception $e) {
//    echo get_class($e) . ' : ' . $e->getMessage();
//}

