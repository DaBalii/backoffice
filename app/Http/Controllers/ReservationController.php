<?php

namespace App\Http\Controllers;



use App\Models\homes;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reservation= reservation::all();
        if (count($reservation)<=0){
            return response(["message"=>"aucune reservation en vue"],200);
        }
        return response($reservation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $resetValidation = $request->validate([
            "name" => ["required", "string"],
            "address" => ["required", "email"],
            "num_tel" => ["required", "integer"],
            "date_arr" => ["required", "date_format:Y-m-d"],
            "duration" => ["required", "integer"],

        ]);

        $reservations = reservation::create([
            "name" => $resetValidation["name"],
            "address" => $resetValidation["address"],
            "num_tel" => $resetValidation["num_tel"],
            "date_arr" => $resetValidation["date_arr"],
            "duration" => $resetValidation["duration"],

        ]);

        return response($reservations , 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $clients = reservation::destroy($id);

        if ($clients > 0) {
            return response(["message" => "Reservations supprimée avec succès"], 200);
        } else {
            return response(["message" => "Aucune Reservation trouvée avec l'ID : $id"], 404);
        }
    }


    //la vue dans le web

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function stores(Request $request)
    {
        $clients = reservation::all();
        return view('reserve.index', ['reserve' => $clients]);
    }

    public function edit($id)
    {
        $clients = reservation::find($id);
        return view('reserve.form', ['reserve' => $clients]);
    }

    public function show()
    {
        $clients = reservation::get();

        return view('reserve.index', ['data' => $clients]);
    }

    public function save(Request $request)
    {
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'num_tel' => $request->num_tel,
            'date_arr' => $request->date_arr,
            'duration' => $request->duration,
        ];


        reservation::create($data);

        return redirect()->route('reserve');
    }




    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'num_tel' => $request->num_tel,
            'date_arr' => $request->date_arr,
            'duration' => $request->duration,

        ];

        reservation::find($id)->update($data);

        return redirect()->route('reserve');
    }

    public function delete($id)
    {
        reservation::find($id)->delete();
        return redirect()->route('reserve');
    }

    public function getReserCount()
    {
        $ReserCount = reservation::count();
        return $ReserCount;
    }



}
