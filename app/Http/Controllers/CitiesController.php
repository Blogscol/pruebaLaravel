<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::table('cities')->paginate(3);

        return view('city.list', compact('cities','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('city.create');
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
            'cod' => 'required|string|min:2|max:2|unique:cities',
            'name' => 'required|string|min:4|max:255',
        ]);

        if ($validator->fails())
        {
            return redirect('/city')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $city = new Cities([
                'cod' => $request->get('cod'),
                'name'=> $request->get('name'),
            ]);

            $city->save();
            return redirect('/city')->with('success', 'City has been added');
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
        $city = Cities::find($id);
    
        return view('city.view',compact('city','city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = Cities::find($id);
    
        return view('city.edit',compact('city','city'));
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
            'cod' => 'required|string|min:2|max:2|unique:cities',
            'name' => 'required|string|min:4|max:255'
        ]);

        if ($validator->fails())
        {
            return redirect('/city')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $city = Cities::find($id);
            $city->cod = $request->get('cod');
            $city->name = $request->get('name');

            $city->update();

            return redirect('/city')->with('success', 'City updated successfully');
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
        $city = Cities::find($id);
        $city->delete();

        return redirect('/city')->with('success', 'City deleted successfully');
    }
}