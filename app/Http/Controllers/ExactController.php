<?php

namespace App\Http\Controllers;

use App\Models\ApiAuth;
use App\Services\ExactService;
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
            if ($request->code !=''){
                ApiAuth::truncate();

                ApiAuth::create([
                   'authorizationCode'=>$request->code
                ]);

                $connection = $this->exactService->connection();

            }
            else{
                $this->exactService->auth();
            }
    }

    public function exaample()
    {
        $item = new \Picqer\Financials\Exact\SalesOrder($this->exactService->connection());
        $items = $item->filter("Created gt datetime'2022-01-10'"); // Uses filters as described in Exact API docs (odata filters)
        dd($items);


// Create new invoice with invoice lines
        $invoiceLines[] = [
            'Item'      => $item->ID,
            'Quantity'  => 1,
            'UnitPrice' => $item->CostPriceStandard
        ];
    }
}
