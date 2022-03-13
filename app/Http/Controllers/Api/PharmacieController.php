<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacieStoreRequest;
use App\Http\Resources\PharmacieResource;
use App\Http\Resources\PharmacieSingleResource;
use App\Models\Pharmacie;
use Illuminate\Http\Request;

class PharmacieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pharmacies = Pharmacie::all();

        if ($request->search) {
            $pharmacies = Pharmacie::where('registered_name', "like", "%{$request->search}%")
            ->orWhere('company_name', "like", "%{$request->search}%")
            ->get();
        } elseif ($request->department_id) {
            $pharmacies = Pharmacie::where('department_id', $request->department_id)->get();
        } 

        return PharmacieResource::collection($pharmacies);
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
    public function store(PharmacieStoreRequest $request)
    {
        $pharmacie = Pharmacie::create($request->validated());

        return response()->json($pharmacie);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacie $pharmacie)
    {
        return new PharmacieSingleResource($pharmacie);
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
    public function update(PharmacieStoreRequest $request, Pharmacie $pharmacie)
    {
        $pharmacie->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacie $pharmacie)
    {
        $pharmacie->delete();

        return response()->json('Record deleted Successfully');
    }
}
