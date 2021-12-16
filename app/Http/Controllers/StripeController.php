<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    public function index()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // $stripe->customers->create([
        // 'name' => 'customer',
        // 'description' => 'Test Customer',
        // ]);
          
        // $stripe->subscriptions->create([
        //     'customer' => 'cus_Ki1QuddI7avbNs',
        //     'items' => [
        //       ['price' => 'price_1K2ENG2eZvKYlo2Ccx32mJRT'],
        //     ],
        // ]);

        //Products
        // $products = $stripe->products->create([
        // 'name' => 'Gold Special',
        // ]);
        $products = $stripe->products->update(
            'prod_Ki1mMSWSlwtRUn',
            [
            'name' => "test", 
            "description"=>"description"
            ]
          );
          
          
        // $coupons = $stripe->coupons->create([
        //     'percent_off' => 26,
        //     'duration' => 'repeating',
        //     'duration_in_months' => 3,
        // ]);
          
        dd($products);
        // $stripe = new Stripe\StripeClient(env('STRIPE_SECRET'));
        // $stripe->plans->create([
        //     'amount' => 1,
        //     'currency' => 'usd',
        //     'interval' => 'month',
        //     'product' => 'prod_Khd2wkHbNtzHVw',
        // ]);
    }
      
}
