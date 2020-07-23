<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipality;

class MunicipalitiesController extends Controller
{

	public function index(){
		//not defined
		return redirect(route('home'));
	}


	public function show($id){
		$municipality = Municipality::where('id', $id)->first();
		return view('pages.details')->with('data', $municipality);
	}

	/*
	AJAX request
	*/
	public function search(Request $request){

		$search = $request->search;

		if($search == ''){
			$municipalities = Municipality::orderby('name','asc')->select('id','name')->limit(5)->get();
		}else{
			$municipalities = Municipality::orderby('name','asc')
				->select('id','name')
				->where('name', 'like', '%' .$search . '%')
				->orWhere('mayor', 'like', '%' .$search . '%')
				->limit(5)->get();
		}

		$response = array();
		foreach($municipalities as $municipality){
			$response[] = array("id"=>$municipality->id,"label"=>$municipality->name);
		}

		return response()->json($response);
	}
}
