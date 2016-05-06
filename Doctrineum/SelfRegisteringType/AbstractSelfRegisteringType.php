<?php
namespace Doctrineum\SelfRegisteringType;

use Doctrine\DBAL\Types\Type;
use Granam\Strict\Object\StrictObjectTrait;
use Granam\Tools\ValueDescriber;

abstract class AbstractSelfRegisteringType extends Type
{
    use StrictObjectTrait;

    /**
     * @return bool If enum has not been registered before and was registered now
     * @throws \Doctrine\DBAL\DBALException
     */
    public static function registerSelf()
    {
        $reflection = new \ReflectionClass(static::class);
        /** @var Type $type */
        $type = $reflection->newInstanceWithoutConstructor();
        $typeName = $type->getName();
        if (static::hasType($typeName)) {
            static::checkRegisteredType($typeName);

            return false;
        }

        static::addType($typeName, static::class);

        return true;
    }

    protected static function checkRegisteredType($typeName)
    {
        $alreadyRegisteredType = static::getType($typeName);
        if (get_class($alreadyRegisteredType) !== get_called_class()) {
            throw new Exceptions\TypeNameOccupied(
                'Under type of name ' . ValueDescriber::describe($typeName) .
                ' is already registered different type ' . get_class($alreadyRegisteredType)
            );
        }
    }
}