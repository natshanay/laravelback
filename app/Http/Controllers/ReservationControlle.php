<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\CarModel;
use Mpdf\Mpdf;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Models\Customer;
use Illuminate\Http\Request;
class ReservationControlle extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));

    }

    public function showindex()
    {

        $reservations = Reservation::all();

        return response()->json($reservations);


    }

    public function create()
    {
        $cars = Car::all();
        $customers = Customer::all();
        $payments = Payment::all();
        return view('reservations.create', compact('cars', 'customers', 'payments'));
    }

    public function download($id)
    {
        $reservation = Reservation::findOrFail($id);
        $filename = "reservation_{$reservation->id}.csv";
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, ['Car', 'Customer', 'Start Date', 'End Date', 'Payment Method', 'Amount', 'Payment Status', 'Payment Date']);

        fputcsv($handle, [
            $reservation->car->name,
            $reservation->customer->name,
            $reservation->car->model->name,
            $reservation->car->type,
            $reservation->start_date,
            $reservation->end_date,
            $reservation->payment ? $reservation->payment->payment_method : 'Not Paid',
            $reservation->payment ? $reservation->payment->payment_date : 'N/A'
        ]);

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return response($content, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'car_id' => 'required|exists:cars,id',
                'customer_id' => 'required|exists:customers,id',
                'amount' => 'required|numeric',
                'payment_id' => 'required|exists:payments,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'status' => 'required|in:pending,confirmed,cancelled',
            ]);
            Reservation::create($validated);
            return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
        } catch (Exception $e) {
            logger()->error('Error creating reservation: ' . $e->getMessage());

            // Display a user-friendly error message
            return redirect()->back()->with('error', 'There was an error creating the reservation. Please try again later.');
        }
    }

    public function show(Reservation $reservation)
    {


        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $cars = Car::all();
        $customers = Customer::all();
        return view('reservations.edit', compact('reservation', 'cars', 'customers'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'payment_id' => 'required|exists:payments,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {

        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled'
        ]);

        $reservation->status = $request->status;
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation status updated successfully.');
    }


}
