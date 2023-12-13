<?php

namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\NumericValidator;
use PHPUnit\Framework\TestCase;

class NumericValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $numericValidator = new NumericValidator($value);

        $isNumeric = $numericValidator->isValid();

        $this->assertEquals($expectedResult, $isNumeric);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsANumber' => ['value' => 2, 'expectedResult' => true],
            'shouldBeValidWhenValueIsANumericString' => ['value' => '22', 'expectedResult' => true],
            'shouldNotBeValidWhenValueIsNotANumber' => ['value' => '23c', 'expectedResult' => false],
            'shouldNotBeValidWhenValueIsEmpty' => ['value' => '', 'expectedResult' => false]
        ];
    }
}
