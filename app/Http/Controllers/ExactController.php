<?php

namespace App\Http\Controllers;

use App\Models\ApiAuth;
use App\Services\ExactService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Picqer\Financials\Exact\Connection;
use Picqer\Financials\Exact\SalesOrder;

class ExactController extends Controller
{
    public $exactService;

    public function __construct()
    {
        $this->exactService = new ExactService();
    }

    public function index(Request $request)
    {
        if ($request->code != '') {
            ApiAuth::truncate();

            ApiAuth::create([
                'authorizationCode' => $request->code
            ]);

            $connection = $this->exactService->connection();

        } else {
            $this->exactService->auth();
        }
    }

    public function exaample()
    {
        $item = new \Picqer\Financials\Exact\SyncSalesOrder($this->exactService->connection());
        $saleOrderObject = new \App\Models\SalesOrder();
        $selectAreas = implode(',', $saleOrderObject->getFillable());
        $items = $item->filter("Timestamp gt 1", '', $selectAreas);
        $items = collect($items)->map(function ($item) {

            $item->Approved = $this->creteTimeToExact($item->Approved);
            $item->Created = $this->creteTimeToExact($item->Created);
            $item->Modified = $this->creteTimeToExact($item->Modified);
            $item->OrderDate = $this->creteTimeToExact($item->OrderDate);
            $item->DeliveryDate = $this->creteTimeToExact($item->DeliveryDate);

            return $item;
        })->toArray();
        foreach ($items as $orderItem) {
            \App\Models\SalesOrder::upsert($orderItem->attributes(),'Timestamp');
        }
    }

    public function creteTimeToExact($str)
    {
        return Carbon::createFromTimestamp(preg_replace('/[^0-9.]+/', '', $str));
    }
}
