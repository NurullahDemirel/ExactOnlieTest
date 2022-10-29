<?php

namespace App\Services;

use App\Models\ApiAuth;
use App\Models\ApiInfo;
use Picqer\Financials\Exact\Connection;
use Exception;

class ExactService
{
    public Connection $connection;

    public ApiInfo $appInfo ;

    public function __construct()
    {
        $_appInfo = ApiInfo::first();

        if (!$_appInfo){
            dd('Api için bilgileri db de gerekli tabloya koy');
        }
        $this->appInfo = $_appInfo;

        $this->connection = new Connection();
    }

    public function setExactRequiredData()
    {
        $this->connection->setRedirectUrl($this->appInfo->redirect_url);
        $this->connection->setExactClientId($this->appInfo->client_id);
        $this->connection->setExactClientSecret($this->appInfo->client_secret);
    }

    public function auth()
    {
        $this->setExactRequiredData();
        $this->connection->redirectForAuthorization();
    }

    public function connection()
    {
        $this->setExactRequiredData();

        if ($this->getValue('authorizationCode')){
            $this->connection->setAuthorizationCode($this->getValue('authorizationCode'));
        }

        if ($this->getValue('accessToken')){
            $this->connection->setAccessToken($this->getValue('accessToken'));
        }
        if ($this->getValue('refreshToken')){
            $this->connection->setRefreshToken($this->getValue('refreshToken'));
        }

        if ($this->getValue('tokenExpires')){
            $this->connection->setTokenExpires($this->getValue('tokenExpires'));
        }

        try {
          $this->connection->connect();

          ApiAuth::first()->update([
              'accessToken' => $this->connection->getAccessToken(),
              'refreshToken' => $this->connection->getRefreshToken(),
              'tokenExpires' => $this->connection->getTokenExpires()
          ]);

            return $this->connection;
        }
        catch (Exception $exception){
            throw new Exception($exception->getMessage(), $exception->getCode());
        }

    }

    public function getValue($key)
    {
        $apiAuth = ApiAuth::first();

        return !$apiAuth ? null : ($apiAuth->$key);
    }

    public function setValue($key,$value)
    {
        $apiAuth = ApiAuth::first();

        if ($apiAuth){
            $apiAuth->update([
                $key => $value
            ]);
        }
        else{
            ApiAuth::create([
                $key => $value
            ]);
        }
    }
}
