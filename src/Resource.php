<?php

namespace Codeup\Resource;

use UnexpectedValueException;

/**
 * @param $value
 * @param string $expectedResourceType
 * @return bool
 */
function is_resource_of_type($value, string $expectedResourceType): bool
{
    return is_resource($value) && $expectedResourceType === get_resource_type($value);
}

/**
 * @param $value
 * @param string $expectedResourceType
 * @throws \UnexpectedValueException
 */
function assert_resource_of_type($value, string $expectedResourceType): void
{
    if (!is_resource($value)) {
        throw new UnexpectedValueException('Not a resource.');
    }
    $resourceType = get_resource_type($value);
    if ($expectedResourceType !== $resourceType) {
        throw new UnexpectedValueException(
            "Resource of type \"$resourceType\" is not of type \"$expectedResourceType\"."
        );
    }
}
