<?php

namespace App\GraphQL\Resolver;

use App\Service\MutationService;
use App\Service\QueryService;
use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use Overblog\GraphQLBundle\Resolver\ResolverMap;

/* CustomMapResolver supports query and mutation:
   querys:
   - findCarBrand - for one object looked by ID
   - getAllCarBrands - for all object in db
   mutations:
   - createCarBrand - creating new object and saves in db
   - updateCarBrand - updateing object that exists in db
   - deleteCarBrand - delating object from db
*/

class CustomResolverMap extends ResolverMap 
{
    public function __construct(
        private QueryService    $queryService,
        private MutationService $mutationService
    ) {}

    /**
     * @inheritDoc
     */
    protected function map(): array 
    {
        return [
            'RootQuery'    => [
                self::RESOLVE_FIELD => function (
                    $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ) {
                    return match ($info->fieldName) {
                        'carbrand' => $this->queryService->findCarBrand((int)$args['id']),
                        'carbrands' => $this->queryService->getAllCarBrands(),
                        default => null
                    };
                },
            ],
            'RootMutation' => [
                self::RESOLVE_FIELD => function (
                    $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ) {
                    return match ($info->fieldName) {
                        'createCarBrand' => $this->mutationService->createCarBrand($args['carbrand']),
                        'updateCarBrand' => $this->mutationService->updateCarBrand((int)$args['id'], $args['carbrand']),
                        'deleteCarBrand' => $this->mutationService->deleteCarBrand((int)$args['id']),
                        default => null
                    };
                },
        
            ],
        ];
    }
}
