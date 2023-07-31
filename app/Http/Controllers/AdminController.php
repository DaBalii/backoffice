<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;
use Validator;

class AdminController extends Controller
{
    public  function  inscription (Request $request){

        $adminData = $request->validate([
            "name" => ["required", "string", "min:2", "max:255"],
            "prenom" => ["required", "string", "min:2", "max:255"],
            "email" => ["required", "email", "unique:admins,email"],
            "tel" => ["required", "string", "unique:admins,tel"],
            "password" => ["required", "string", "min:8", "max:255","confirmed"]
        ]);

        $admins = admin::create([
            "name" => $adminData["name"],
            "prenom" => $adminData["prenom"],
            "email" => $adminData["email"],
            "tel" => $adminData["tel"],
            "password" => bcrypt($adminData["password"])
        ]);

        return response($admins, 201);
    }


    public function connexion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:8", "max:255"]
        ]);

        if($validator->fails()){
            return new JsonResponse( $validator->errors(), 401);
        }

        $admins = admin::where('email', $request->email)->first();

        if (!$admins || !Hash::check($request->password, $admins->password)) {
            return new JsonResponse(["message" => "Invalid credentials"], 401);
        }

        $token = $admins->createToken("CLE_SECRETE")->plainTextToken;

        return new JsonResponse([
            "admin" => $admins,
            "token" => $token
        ], 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $admins = admin::all();
        return view('admin.index', ['admin' => $admins]);
    }

    public function edit($id)
    {
        $admins = admin::find($id);
        return view('admin.form', ['admin' => $admins]);
    }

    public function index()
    {
        $admins = admin::get();

        return view('admin.index', ['data' => $admins]);
    }

    public function save(Request $request)
    {
        $data = [
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => $request->password,

        ];


        admin::create($data);

        return redirect()->route('admin');
    }




    public function update($id, Request $request)
    {
        $data = [
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => $request->password,

        ];

        admin::find($id)->update($data);

        return redirect()->route('admin');
    }

    public function delete($id)
    {
        admin::find($id)->delete();
        return redirect()->route('admin');
    }



}
