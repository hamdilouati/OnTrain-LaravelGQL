<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Seeder;
use App\Models\Enterprise;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $persons = Person::factory(10)->create();
        foreach ($persons as $person){
            $enterprise = Enterprise::factory(1)->create();
            $person->enterprises()->sync($enterprise);

            $address = Address::factory(1)->create();
            $person->address()->save($address->first());
        }
    }
}
