<?php

namespace App\Http\Controllers;

use App\Http\Requests\BonusRequest;
use App\Models\Bonus;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bonuses = Bonus::all();
        return view('bonuses.index', compact('bonuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bonuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BonusRequest $request)
    {
        $totalBonus = $request->input('totalBonus');
        $percentage1 = $request->input('percentage1');
        $percentage2 = $request->input('percentage2');
        $percentage3 = $request->input('percentage3');
        if ($percentage1 + $percentage2 + $percentage3 != 100) {
            return redirect()->back()->with('message', 'The percentage value is not equal to 100%');
        }
        $bonus1 = $totalBonus * $percentage1 / 100;
        $bonus2 = $totalBonus * $percentage2 / 100;
        $bonus3 = $totalBonus * $percentage3 / 100;
        $bns = Bonus::create([
            'totalBonus' => $totalBonus,
            'percentage1' => $percentage1,
            'bonus1' => $bonus1,
            'percentage2' => $percentage2,
            'bonus2' => $bonus2,
            'percentage3' => $percentage3,
            'bonus3' => $bonus3,
        ]);
        // dd($bns);
        return redirect()->route('bonuses.index')->with('success', 'Bonus payment data has been saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bonus $bonus)
    {
        return view('bonuses.show', compact('bonus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bonus $bonus)
    {
        return view('bonuses.edit', compact('bonus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BonusRequest $request, Bonus $bonus)
    {
        if (($request->percentage1 + $request->percentage2 + $request->percentage3) != 100) {
            return redirect()->back()->with('message', 'The percentage value is not equal to 100%');
        }

        $bonus->update([
            'totalBonus' => $request->totalBonus,
            'percentage1' => $request->percentage1,
            'bonus1' => $request->totalBonus * $request->percentage1 / 100,
            'percentage2' => $request->percentage2,
            'bonus2' => $request->totalBonus * $request->percentage2 / 100,
            'percentage3' => $request->percentage3,
            'bonus3' => $request->totalBonus * $request->percentage3 / 100,
        ]);
        // dd($bonus);
        return redirect()->route('bonuses.index')->with('success', 'Bonus payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bonus $bonus)
    {
        $bonus->delete();
        return redirect()->route('bonuses.index')->with('success', 'Bonus payment deleted successfully');
    }
}
