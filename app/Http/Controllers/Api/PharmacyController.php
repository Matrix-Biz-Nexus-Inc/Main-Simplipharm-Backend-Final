<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyStoreRequest;
use App\Http\Resources\PharmacyResource;
use App\Http\Resources\PharmacySingleResource;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pharmacies = Pharmacy::all();

        if ($request->search) {
            $pharmacies = Pharmacy::where('registered_name', "like", "%{$request->search}%")
            ->orWhere('company_name', "like", "%{$request->search}%")
            ->get();
        } elseif ($request->department_id) {
            $pharmacies = Pharmacy::where('department_id', $request->department_id)->get();
        } 

        return PharmacyResource::collection($pharmacies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacyStoreRequest $request)
    {
        $pharmacy = Pharmacy::create($request->validated());

        return response()->json($pharmacy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        return new PharmacySingleResource($pharmacy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacyStoreRequest $request, Pharmacy $pharmacy)
    {
        $pharmacy->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();

        return response()->json('Record deleted Successfully');
    }
}
