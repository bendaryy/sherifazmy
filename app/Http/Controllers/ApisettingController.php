<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;

class ApisettingController extends Controller
{

    public function index()
    {
        $setting = Details::first();

        return view('apisetting.index', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Details::first();

        return view('apisetting.edit', compact('setting'));
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

        $request->validate([

            'client_id' => 'required',
            'client_secret' => 'required',
            'company_id' => 'required',
            'company_name' => 'required',
            'governate' => 'required',
            'regionCity' => 'required',
            'street' => 'required',
            'buildingNumber' => 'required',
            'issuerType' => 'required',
        ]);

        $setting = Details::first();

        $setting->update($request->all());

        session()->flash('message', 'Updated Successfully');

        return redirect('setting');

    }
}
