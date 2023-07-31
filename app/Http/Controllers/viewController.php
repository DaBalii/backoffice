<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\visiter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class viewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $visitation= visiter::all();
        if (count($visitation)<=0){
            return response(["message"=>"aucune visite en vue"],200);
        }
        return response($visitation);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $visitation = $request->validate([
            "address" => ["required", "string"],
            "email" => ["required", "email", "unique:admins,email"],
            "localisation"=>["required","string"],
            "periode"=>["required","integer"],
            "tel"=>["required","integer"],
        ]);

        $visitation = visiter::create([

            "address" => $visitation["address"],
            "email" => $visitation["email"],
            "localisation" => $visitation["localisation"],
            "periode" => $visitation["periode"],
            "tel" => $visitation["tel"],
        ]);

        return response(["message" => "visiter effectuée avec succès"], 200);
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
        $visitation = visiter::destroy($id);

        if ($visitation > 0) {
            return response(["message" => "visite supprimée avec succès"], 200);
        } else {
            return response(["message" => "Aucune visite trouvée avec l'ID : $id"], 404);
        }
    }


    // la vue vers le web

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function stores(Request $request)
    {
        $visitation = visiter::all();
        return view('visits.index', ['visits' => $visitation]);
    }

    public function edit($id)
    {
        $visitation = visiter::find($id);
        return view('visits.form', ['visits' => $visitation]);
    }

    public function show()
    {
        $visitation = visiter::get();

        return view('visits.index', ['data' => $visitation]);
    }

    public function save(Request $request)
    {
        $data = [
            'address' => $request->address,
            'email' => $request->email,
            'localisation' => $request->localisation,
            'periode' => $request->periode,
            'tel' => $request->tel,
        ];


        visiter::create($data);

        return redirect()->route('visits');
    }


    public function update($id, Request $request)
    {
        $data = [
            'address' => $request->address,
            'email' => $request->email,
            'localisation' => $request->localisation,
            'periode' => $request->periode,
            'tel' => $request->tel,

        ];

        visiter::find($id)->update($data);

        return redirect()->route('visits');
    }

    public function delete($id)
    {
        visiter::find($id)->delete();
        return redirect()->route('visits');
    }

}
