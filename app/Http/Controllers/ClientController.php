<?php

namespace App\Http\Controllers;

use Auth;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('cityFilter'))
        {
            $ciudad = $request->input('cityFilter');
            $clients = DB::table('clients')->where('city', $ciudad)->paginate(3);
        }
        else
            $clients = DB::table('clients')->paginate(3);

        $cities = DB::table('cities')->get();
        return view('client.list', compact('clients','cities'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = DB::table('cities')->get();
        return view('client.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'cod' => 'required|string|min:4|max:10|unique:clients',
            'name' => 'required|string|min:4|max:255',
            'city' => 'required|string|min:4|max:255'
        ]);

        if ($validator->fails())
        {
            return redirect('/client')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $client = new Client([
                'cod' => $request->get('cod'),
                'name'=> $request->get('name'),
                'city'=> $request->get('city')
            ]);

            $client->save();
            return redirect('/client')->with('success', 'Client has been added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
    
        return view('client.view',compact('client','client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
    
        return view('client.edit',compact('client','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'cod' => 'required|string|min:4|max:10|unique:clients',
            'name' => 'required|string|min:4|max:255',
            'city' => 'required|string|min:4|max:255'
        ]);

        if ($validator->fails())
        {
            return redirect('/client')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $client = Client::find($id);
            $client->cod = $request->get('cod');
            $client->name = $request->get('name');
            $client->city = $request->get('city');

            $client->update();

            return redirect('/client')->with('success', 'City updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect('/client')->with('success', 'Client deleted successfully');
    }
}