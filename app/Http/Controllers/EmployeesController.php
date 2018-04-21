<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeesController extends Controller
{
	 /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$employees = Employee::get();
		return view('employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$companies = Company::get();
		return view('employees.create', compact('companies'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreEmployeeRequest $request)
	{
		try {
			$employee = Employee::create($request->all());
			$response = redirect()->route('employees.index')->withSuccess($employee->first_name . ' has been created!');
		} catch (\Throwable $t) {
			$response = redirect()->back()->withErrors($t->getMessage());
		}

		return $response;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Employee $employee)
	{
		return view('employees.show', compact('employee'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Employee $employee)
	{
		$companies = Company::get();
		return view('employees.edit', compact('employee', 'companies'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateEmployeeRequest $request, Employee $employee)
	{
		$employee->update($request->all());
		return redirect()->route('employees.index')->withSuccess($employee->first_name . ' has been updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Employee $employee)
	{
		$message = $employee->fullname . " successfully deleted!";
		$employee->delete();

		return redirect()->route('employees.index')->withSuccess($message);
	}
}
