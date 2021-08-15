<?php

namespace App\Http\Controllers;

use App\Http\Requests\OurContactValidation;
use App\OurContact;
use Illuminate\Http\Request;

class OurContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = OurContact::orderBy('name', 'ASC')->get();
        return view('pages.our-contact.index', ['contacts' => $contacts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OurContactValidation $request)
    {
        OurContact::create([
            'name' => $request->name,
            'value' => $request->value,
            'link' => $request->link
        ]);


        return redirect()->back()->with(
            'success', 'Berhasil tambah kontak ' . $request->name
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurContact  $ourContact
     * @return \Illuminate\Http\Response
     */
    public function update(OurContactValidation $request, OurContact $ourContact)
    {
        $ourContact->update($request->validated());
        return redirect()->back()->with(
            'success', 'Berhasil update detail kontak ' . $request->name
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurContact  $ourContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurContact $ourContact)
    {
        $contactWillBeDelete = $ourContact;
        $ourContact->delete();
        return redirect()->back()->with(
            'success', 'Berhasil hapus kontak dengan nama ' . $contactWillBeDelete->name
        );
    }
}
