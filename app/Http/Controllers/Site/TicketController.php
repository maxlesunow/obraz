<?php

namespace App\Http\Controllers\Site;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class TicketController extends Controller
{
    //

    public function getTicket($id){

        $reservation = Reservation::findorfail($id);

        $pdf = PDF::loadView('pdf.ticket', compact('reservation'));
        $pdf->setPaper('a4')->setWarnings(false);
        return $pdf->stream();

    }
}
