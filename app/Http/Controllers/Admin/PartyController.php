<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Party;
use Auth;
use carbon\carbon;


class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.party.index',[
            'parties'  => Party::latest('id')->where('deleted','=','no')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
        return view('admin.party.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
      {
        $request->validate([
            'party_name'      => 'nullable|string',
            'party_number'    => 'required|unique:parties|max:14',
            'party_address'   => 'nullable|string',
        ]);

        $party = New Party();
        $party->party_name             = $request->party_name;
        $party->party_code             = $request->party_code;
        $party->party_address          = $request->party_address;
        $party->party_number           = $request->party_number;
        $party->party_alternate_number = $request->party_alternate_number;
        $party->party_credit_limit     = $request->party_credit_limit;
        $party->party_type             = $request->party_type;
        $party->created_by             = Auth::id();
        $party->created_date           = carbon::now();
        $party->save();

      Toastr::success('Order Successfully Saved :)' ,'Success');
       return redirect()->route('admin.party.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.party.edit',[
            'edit'  => Party::find($id)
        ]);
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
            'party_name'      => 'nullable|string',
            'party_number'    => 'required|unique:parties|max:14',
            'party_address'   => 'nullable|string',
        ]);

         $party = Party::find($id);

        $party->party_name             = $request->party_name;
        $party->party_code             = $request->party_code;
        $party->party_address          = $request->party_address;
        $party->party_number           = $request->party_number;
        $party->party_alternate_number = $request->party_alternate_number;
        $party->party_credit_limit     = $request->party_credit_limit;
        $party->party_type             = $request->party_type;
        $party->updated_by             = Auth::id();
        $party->updated_date           = carbon::now();
        $party->save();

      Toastr::success('Order Successfully Update :)' ,'Success');
       return redirect()->route('admin.party.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
            $party               = Party::find($id);
            $party->deleted_by   = Auth::id();
            $party->deleted      = 'yes';
            $party->deleted_date = carbon::now();
            $party->status       = 'Inactive';
            $party->save();


      Toastr::success('Order Deleted :)' ,'Success');
       return redirect()->route('admin.party.index');
    }
}
