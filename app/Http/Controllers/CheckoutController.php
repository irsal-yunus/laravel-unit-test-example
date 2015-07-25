<?php

namespace App\Http\Controllers;

use App\Services\Checkout;

class CheckoutController extends Controller
{
    /**
     * @var Checkout
     */
    protected $checkout;

    /**
     * Constructor
     *
     * @param Checkout $checkout
     */
    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     * Place order
     *
     * @return \Illuminate\View\View
     */
    public function placeOrder($paymentMethod)
    {
        $view = view('checkout')->with('paymentMethod', $paymentMethod);
        $view->with('orderTotal', $this->checkout->calculateTotal($paymentMethod));

        return $view;
    }

}