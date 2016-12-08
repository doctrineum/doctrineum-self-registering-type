<?php
namespace Doctrineum\Tests\SelfRegisteringType;

class JustSomeSelfRegisteringTypeTest extends AbstractSelfRegisteringTypeTest
{
    /**
     * @return mixed
     */
    protected function getTypeClass()
    {
        return JustSomeSelfRegisteringType::class;
    }

}