<?php

namespace App\GraphQL\Resolver;

use App\Service\QueryService;
use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use Overblog\GraphQLBundle\Resolver\ResolverMap;

class CustomResolverMap extends ResolverMap 
{
    public function __construct(
        private QueryService    $queryService,
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

        ];
    }
}
