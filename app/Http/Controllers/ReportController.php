<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Reservation;

class ReportController extends Controller
{
    /**
     * Display a listing of the reports.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all reservations with related car data
        $reservations = Reservation::with('car')->get();

        return view('reports.index', compact('reservations'));
    }

    /**
     * Generate and download a report (e.g., as CSV).
     *
     * @return \Illuminate\Http\Response
     */
    public function generate()
    {
        $reservations = Reservation::with('car')->get();

        // Example: Generate a CSV report
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=report.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['ID', 'Car Model', 'Customer Name', 'Reservation Date', 'Status', 'Total Amount']);

        foreach ($reservations as $reservation) {
            fputcsv($handle, [
                $reservation->id,
                $reservation->car->model,
                $reservation->customer_name,
                $reservation->reservation_date->format('Y-m-d'),
                $reservation->status,
                $reservation->total_amount,
            ]);
        }

        fclose($handle);

        return response()->stream(
            function () use ($handle) {
                fclose($handle);
            },
            200,
            $headers
        );
    }
}
