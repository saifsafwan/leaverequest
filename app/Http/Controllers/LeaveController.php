<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('staff.leave', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required'],
            'leave_type' => ['required'],
            'reason' => ['required'],
            'days_requested' => ['required','integer'],
            'todayDate' => ['required','date'],
            'leave_from' => ['required', 'date'],
            'leave_to' => ['required','date'],
        ]);

        $check = Leave::create([
            'user_id' => $data['user_id'],
            'leave_type' => $data['leave_type'],
            'reason' => $data['reason'],
            'days_requested' => $data['days_requested'],
            'date' => $data['todayDate'],
            'leave_from' => $data['leave_from'],
            'leave_to' => $data['leave_to'],
        ]);

        if($check)
            return view('staff.index');
        else
            return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
