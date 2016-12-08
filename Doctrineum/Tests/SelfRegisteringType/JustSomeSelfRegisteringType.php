<?php
namespace Doctrineum\Tests\SelfRegisteringType;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrineum\SelfRegisteringType\AbstractSelfRegisteringType;

class JustSomeSelfRegisteringType extends AbstractSelfRegisteringType
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'foo';
    }

    const JUST_SOME_SELF_REGISTERING = 'just_some_self_registering';

    /**
     * @return string
     */
    public function getName()
    {
        return self::JUST_SOME_SELF_REGISTERING;
    }

}