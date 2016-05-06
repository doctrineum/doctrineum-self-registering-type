<?php
namespace Doctrineum\Tests\SelfRegisteringType;

use Doctrineum\SelfRegisteringType\JustSomeSelfRegisteringType;
use Doctrineum\Tests\SelfRegisteringType\TestHelpers\EnumTypes\IAmUsingOccupiedName;

class JustSomeSelfRegisteringTypeTest extends AbstractSelfRegisteringTypeTest
{

    /**
     * @test
     * @expectedException \Doctrineum\SelfRegisteringType\Exceptions\TypeNameOccupied
     */
    public function I_can_not_accidentally_replace_type_by_another_of_same_name()
    {
        JustSomeSelfRegisteringType::registerSelf();
        IAmUsingOccupiedName::registerSelf();
    }

}
