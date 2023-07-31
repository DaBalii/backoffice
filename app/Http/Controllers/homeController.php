<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\homes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;


class homeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function store()
    {
        $home= homes::all();
        if (count($home)<=0){
            return response(["message"=>"aucune maison en vue"],200);
        }
        return response($home);
    }

    public function index()
    {
        $home = homes::get();

        return view('homes.index', ['data' => $home]);
    }

    public function add()
    {
        $category = category::get();

        return view('homes.form', ['category' => $category]);
    }


    public function save(Request $request)
    {
        $rules = [
            'item_code' => 'required',
            'localisation' => 'required',
            'description' => 'required',
            'bathrooms' => 'required|numeric',
            'area' => 'required|numeric',
            'model' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messages = [
            'path.image' => 'Le fichier doit être une image (jpeg, png, jpg, gif).',
            'path.mimes' => 'Le fichier doit être au format jpeg, png, jpg ou gif.',
            'path.max' => 'La taille du fichier doit être inférieure à 2 Mo.',
            'item_code'=>'le code est invalide !!'
        ];


        $validatedData = $request->validate($rules, $messages);

        $data = [
            'item_code' => $request->item_code,
            'localisation' => $request->localisation,
            'description' => $request->description,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'model' => $request->model,
            'category' => $request->id_category,
            'price' => $request->price
        ];

        if ($request->hasFile('path')) {
            $imagePath = $request->file('path')->store('images', 'public');
            $data['path'] = $imagePath;
        } else {
            $data['path'] = 'default.jpg';
        }

        homes::create($data);

        return redirect()->route('homes');
    }



    /*public function save(Request $request)
    {
        $data = [
            'item_code' => $request->item_code,
            'localisation' => $request->localisation,
            'description' => $request->description,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'model' => $request->model,
            'path' => $request->path,
            'category' => $request->id_category,
            'price' => $request->price
        ];

        homes::create($data);

        return redirect()->route('homes');
    }*/

    public function edit($id)
    {
        $home = homes::find($id);
        $category = category::get();

        return view('homes.form', ['home' => $home, 'category' => $category]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'item_code' => $request->item_code,
            'localisation' => $request->localisation,
            'description' => $request->description,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'model' => $request->model,
            'path' => $request->path,
            'category' => $request->id_category,
            'price' => $request->price
        ];

        homes::find($id)->update($data);

        return redirect()->route('homes');
    }

    public function delete($id)
    {
        homes::find($id)->delete();
        return redirect()->route('homes');
    }
}
