<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Employee;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$faker = Faker::create();
		foreach(range(1,100) as $index){
			// Returns always random genders according to the name, inclusive mixed !!

			$gender = $faker->randomElement($array = array('male','female','mixed'));

			DB::table('employees')->insert([
				'first_name' => $faker->firstName($gender),
				'last_name' => $faker->lastName,
				'email' => $faker->unique()->safeEmail,
				'hobbies' => $faker->randomElement($array = array ('TV', 'Reading','Coding', 'Skiing')),
				'gender' => $faker->randomElement($array = array ('male', 'female', 'mixed')),          
				'picture' => $faker->image(NULL,400,300, 'people', true),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			]);
		}
    }
}
