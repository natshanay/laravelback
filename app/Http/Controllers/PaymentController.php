<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the payments.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));

    }
    // return view('payments.index', compact('payments'));

    /**
     * Show the form for creating a new payment.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        // $contacts = Contacts::all();

        return view('payments.create');
    }

    /**
     * Store a newly created payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'payment_method' => 'required|string',

        ]);

        Payment::create($validatedData);

        return redirect()->route('payments.index');

    }

    /**
     * Display the specified payment.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\View\View
     */
    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\View\View
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([

            'payment_method' => 'required|string',

        ]);

        $payment = Payment::findOrFail($id);

        $payment->update($validatedData);

        return redirect()->route('payments.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified payment from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')
                         ->with('success', 'Payment deleted successfully.');
    }
}
