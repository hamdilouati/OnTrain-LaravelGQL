<?php

namespace GraphQL\Resolvers;

use App\Models\User;
use App\Models\Person;
use App\Models\Address;
use App\Models\Skill;
use App\Models\Enterprise;
use Illuminate\Support\Facades\Hash;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;

class MutationResolver
{
    // User CRUD mutations
   public function createUser($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $args['password'] = Hash::make($args['password']);
       return User::create($args);
   }

   public function updateUser($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $user = User::findOrFail($args['id']);

       if (isset($args['password'])) {
           $args['password'] = Hash::make($args['password']);
       }

       $user->update($args);
       return $user;
   }

   public function deleteUser($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $user = User::findOrFail($args['id']);
       $user->delete();
       return $user;
   }

   public function createPerson($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
         return Person::create([
             'firstname' => $args['firstname'],
             'lastname' => $args['lastname'],
             'email' => $args['email'],
             'date_of_birth' => $args['date_of_birth'],
             'phone' => $args['phone']
         ]);
   }

   public function deletePerson($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
         $person = Person::findOrFail($args['id']);
         $person->delete();
         return $person;
   }

   public function updatePerson($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $person = Person::findOrFail($args['id']);

       if (isset($args['firstname'])) {
           $person->firstname = $args['firstname'];
       }
       if (isset($args['lastname'])) {
           $person->lastname = $args['lastname'];
       }
       if (isset($args['email'])) {
           $person->email = $args['email'];
       }
       if (isset($args['date_of_birth'])) {
           $person->date_of_birth = $args['date_of_birth'];
       }
       if (isset($args['phone'])) {
           $person->phone = $args['phone'];
       }

       $person->save();
       return $person;
   }

   public function createAddress($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return Address::create([
            'address' => $args['address'],
            'postal_code' => $args['postal_code'],
            'city' => $args['city'],
            'country' => $args['country'],
            'person_id' => $args['person_id']
        ]);
   }

   public function updateAddress($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $address = Address::findOrFail($args['id']);

       if (isset($args['address'])) {
           $address->address = $args['address'];
       }
       if (isset($args['postal_code'])) {
           $address->postal_code = $args['postal_code'];
       }
       if (isset($args['city'])) {
           $address->city = $args['city'];
       }
       if (isset($args['country'])) {
           $address->country = $args['country'];
       }
       if (isset($args['person_id'])) {
           $address->person_id = $args['person_id'];
       }

       $address->save();
       return $address;
   }

   public function deleteAddress($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $address = Address::findOrFail($args['id']);
       $address->delete();
       return $address;
   }

   public function createSkill($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       return Skill::create([
           'title' => $args['title'],
           'description' => $args['description'],
           'experience' => $args['experience'],
           'person_id' => $args['person_id']
       ]);
   }

   public function updateSkill($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $skill = Skill::findOrFail($args['id']);

       if (isset($args['name'])) {
           $skill->name = $args['name'];
       }
       if (isset($args['level'])) {
           $skill->level = $args['level'];
       }
       if (isset($args['person_id'])) {
           $skill->person_id = $args['person_id'];
       }

       $skill->save();
       return $skill;
   }

   public function deleteSkill($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $skill = Skill::findOrFail($args['id']);
       $skill->delete();
       return $skill;
   }

   public function createEnterprise($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       return Enterprise::create([
           'name' => $args['name'],
           'registered_at' => $args['registered_at']
       ]);
   }

   public function updateEnterprise($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $enterprise = Enterprise::findOrFail($args['id']);

       if (isset($args['name'])) {
           $enterprise->name = $args['name'];
       }
       if (isset($args['registered_at'])) {
           $enterprise->registered_at = $args['registered_at'];
       }

       $enterprise->save();
       return $enterprise;
   }

   public function deleteEnterprise($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       $enterprise = Enterprise::findOrFail($args['id']);
       $enterprise->delete();
       return $enterprise;
   }

   public function assignPersonsToEnterprise($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        $enterprise = Enterprise::findOrFail($args['enterprise_id']);
        $assignedPersons = [];

        foreach ($args['person_ids'] as $person_id) {
            $person = Person::findOrFail($person_id);
            $enterprise->persons()->attach($person, [
                'role' => 'employee',
                'from_date' => now()->format('Y-m-d'),
                'to_date' => null,
                'description' => null,
            ]);

            $assignedPersons[] = [
                'enterprise' => $enterprise,
                'person' => $person,
                'role' => 'employee',
                'from_date' => now()->format('Y-m-d'),
                'to_date' => null,
                'description' => null,
            ];
        }

        return $assignedPersons;
    }

}
