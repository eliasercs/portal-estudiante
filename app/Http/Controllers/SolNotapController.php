<?php

namespace App\Http\Controllers;

use App\Models\Sol_notap;
use Illuminate\Http\Request;
use DB;

class SolNotapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('dbo.sol_notap')
        ->get();
        return view('auth.solinotap', compact('query'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sol_notap  $sol_notap
     * @return \Illuminate\Http\Response
     */
    public function show(Sol_notap $sol_notap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sol_notap  $sol_notap
     * @return \Illuminate\Http\Response
     */
    public function edit(Sol_notap $sol_notap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sol_notap  $sol_notap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sol_notap $sol_notap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sol_notap  $sol_notap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sol_notap $sol_notap)
    {
        //
    }
}
