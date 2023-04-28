<?php

namespace GraphQL\Resolvers;

use App\Models\User;
use App\Models\Person;
use App\Models\Address;
use App\Models\Skill;
use App\Models\Enterprise;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Type\Definition\ResolveInfo;

class QueryResolver
{
    public function users($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return User::all();
    }

    public function user($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
       return User::find($args['id']);
    }

    public function persons($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return Person::all();
    }

    public function person($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return Person::find($args['id']);
    }

    public function addresses($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return Address::all();
    }

    public function address($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return Address::find($args['id']);
    }

    public function skills($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return Skill::all();
    }

    public function skill($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return Skill::find($args['id']);
    }

    public function enterprises($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return Enterprise::all();
    }

    public function enterprise($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo){
        return Enterprise::find($args['id']);
    }
}
