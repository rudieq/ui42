<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;

class DummyDataController extends Controller
{
	public function list(){
		//return 'dummy data list';
		return view('dummy_data.list');
	}

	public function detail($name, Faker $faker){
		$cityName = $faker->city;
		$data = [
			'name' =>  $cityName,
			'address' => [ 
				$faker->streetName . ' ' . $faker->buildingNumber,
				/*$faker->postcode*/ $faker->randomNumber(3, true) . ' ' . $faker->randomNumber(2, true) . ' ' . $cityName
			],
			'email' => $faker->email,
			'web' => $faker->url,
			'mayor' => $faker->name,
			'phone' => $faker->phoneNumber,
			'fax' => $faker->phoneNumber
		];
		return view('dummy_data.detail')->with($data);
	}
	public function edit($id, Faker $faker){
		$data = [
		'id' => $id,
		'name' =>  '',
		'address' => [
			'streetName' => '',
			'buildingNumber' => '',
			'postcode' => '',
			// 'city' => $faker->city
		],
		'email' => '',
		'web' => '',
		'mayor' => '',
		'phone_prefix' => '',
		'phone' => '',
		'fax' => ''
		];

		if ($id <= 10) {
			$data = [
				'id' => $id,
				'name' =>  $faker->city,
				'address' => [
					'streetName' => $faker->streetName,
					'buildingNumber' => $faker->buildingNumber,
					'postcode' => $faker->randomNumber(3, true) . ' ' . $faker->randomNumber(2, true),
					// 'city' => $faker->city
				],
				'email' => $faker->email,
				'web' => $faker->url,
				'mayor' => $faker->name,
				'phone_prefix' => '0' . $faker->numberBetween(2,555),
				'phone' => $faker->randomNumber(8, true),
				'fax' => $faker->randomNumber(8, true)
			];
		}

		return view('dummy_data.edit')->with($data);
	}
}
