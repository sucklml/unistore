<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{

    public function index()
    {
        $shops = Shop::all();
        return view('shop.index', compact('shops'));

    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        //TODO: Manera #1: validaciones internas en el controller
        $rules = [
            'name'=> 'required|string|min:4|max:30|unique:shops,name',
            'address'=>'required|string|min:10|max:50',
            'phone'=>'nullable|string|min:6|max:15'
        ];

        $messages = [
            'name.required'=> 'El nombre de la tienda es obligatorio',
            'name.string' => 'El nombre debe contener caracteres validos',
            'name.min' => 'El nombre debe contener minimo 4 caracteres',
            'name.max'=> 'El nombre debe contener maximo 30 caracteres',
            'name.unique' =>'El nombre ya esta siendo usado por otra tienda',
            'address.required'=> 'La direccion de la tienda es obligatoria',
            'address.string' => 'La direccion debe contener caracteres validos',
            'address.min'=> 'La direccion debe contener minimo 10 caracteres',
            'address.max'=>  'La direccion debe contener maximo 50 caracteres',
            'phone.string'=> 'El telefono debe contener caracteres validos',
            'phone.min'=> 'El telefono debe contener minimo 6 caracteres',
            'phone.max'=> 'El telefono debe contener maximo 15 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ( !$validator->fails() )
        {
            $shop = Shop::create([
                'name' => $request->get('name'),
                'address'=> $request->get('address'),
                'phone' => $request->get('phone')
            ]);
        }
        return response()->json($validator->messages(), 200);
    }


    public function edit($id)
    {
        $shop = Shop::find($id);

        return view('shop.edit',compact('shop'));
    }
    public function update(Request $request)
    {
        //TODO: Manera #1: validaciones internas en el controller
        $rules = [
            'id' => 'required|exists:shops,id',
            'name'=> 'required|string|min:4|max:30',
            'address'=>'required|string|min:10|max:50',
            'phone'=>'nullable|string|min:6|max:15'
        ];

        $messages = [
            'id.required'=> 'No se ha recibido el identificador de la tienda',
            'id.exists'=> 'La tienda no existe en la base de datos',
            'name.required'=> 'El nombre de la tienda es obligatorio',
            'name.string' => 'El nombre debe contener caracteres validos',
            'name.min' => 'El nombre debe contener minimo 4 caracteres',
            'name.max'=> 'El nombre debe contener maximo 30 caracteres',
            'address.required'=> 'La direccion de la tienda es obligatoria',
            'address.string' => 'La direccion debe contener caracteres validos',
            'address.min'=> 'La direccion debe contener minimo 10 caracteres',
            'address.max'=>  'La direccion debe contener maximo 50 caracteres',
            'phone.string'=> 'El telefono debe contener caracteres validos',
            'phone.min'=> 'El telefono debe contener minimo 6 caracteres',
            'phone.max'=> 'El telefono debe contener maximo 15 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ( !$validator->fails()){
            $shop = Shop::find($request->get('id'));
            $shop-> name = $request->get('name');
            $shop-> address = $request->get('address');
            $shop-> phone = $request->get('phone');
            $shop->save();
        }
        return response()->json($validator->messages(), 200);
    }

    public function destroy(Request $request)
    {

        $rules = [
            'id' => 'required|exists:shops,id',

        ];

        $messages = [
            'id.required'=> 'No se ha recibido el identificador de la tienda',
            'id.exists'=> 'La tienda no existe en la base de datos',

        ];
        $validator = Validator::make($request->all(), $rules,$messages);

        if ( !$validator->fails()){
            $shop = Shop::find($request->get('id'));

            $shop->delete();
        }
        return response()->json($validator->messages(), 200);
    }



    public function trashed(){
        $shops = Shop::onlyTrashed()->get();
        return view('shop.restore', compact('shops'));
    }
    public function restore( Request $request )
    {
        $rules = [
            'id' => 'required|exists:shops,id',
        ];

        $messages = [
            'id.required' => 'No se ha recibido el identificador de la tienda.',
            'id.exists' => 'La tienda no existe en la base de datos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ( !$validator->fails() )
        {
            $shop = Shop::onlyTrashed()->where('id', $request->get('id'))
                ->restore();
        }

        return response()->json($validator->messages(), 200);
    }
}


