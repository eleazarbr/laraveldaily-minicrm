<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$companies = Company::get();
		return view('companies.index', compact('companies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('companies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCompanyRequest $request)
	{
		try {
			DB::beginTransaction();
			Company::create($request->all());
			$request->file('logo')->store('logo');
			DB::commit();
		} catch (\Throwable $t) {
			DB::rollback();
			return redirect()->back()->withErrors(['error' => $t->getMessage()]);
		}

		return redirect()->route('companies.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Company $company)
	{
		// return view('company.show', compact('company'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Company $company)
	{
		return view('companies.edit', compact('company'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCompanyRequest $request, Company $company)
	{
		$company->update($request->all());
		return redirect()->route('companies.index')->withSuccess($company->first_name . ' updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Company $company)
	{
		// Authorization

		// Ask before delete with a modal
		// $company->delete();

		// also delete users
		return redirect()->route('companies.index')->withSuccess(' Company deleted!');
		
	}
}
