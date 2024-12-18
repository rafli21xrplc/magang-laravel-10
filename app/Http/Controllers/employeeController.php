<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Http\Requests\createEmployee;
use App\Http\Requests\storeEmployee;
use App\Http\Requests\updateEmployee;
use App\Models\employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{

    protected EmployeeInterface $employee;

    public function __construct(EmployeeInterface $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = $this->employee->get();
        return view('employee', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeEmployee $request)
    {
        try {
            $this->employee->store($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'failed created');
        }
        return redirect()->back()->with('success', 'success created');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateEmployee $request, employee $employee)
    {
        try {
            $this->employee->update($employee->id, $request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'failed updated');
        }
        return redirect()->back()->with('success', 'success updated');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        try {
            $this->employee->delete($employee->id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'failed deleted');
        }
        return redirect()->back()->with('success', 'success deleted');
    }
}
