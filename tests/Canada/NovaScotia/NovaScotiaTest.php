<?php

declare(strict_types=1);
/*
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2021 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <me@sachatelgenhof.com>
 */

namespace Yasumi\tests\Canada\NovaScotia;

use ReflectionException;
use Yasumi\Holiday;

/**
 * Class for testing holidays in Nova Scotia.
 */
class NovaScotiaTest extends NovaScotiaBaseTestCase
{
    /**
     * @var int year random year number used for all tests in this Test Case
     */
    protected $year;

    /**
     * Initial setup of this Test Case.
     */
    protected function setUp(): void
    {
        $this->year = $this->generateRandomYear(1978);
    }

    /**
     * Tests if all official holidays in Nova Scotia are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testOfficialHolidays(): void
    {
        $holidays = [
            'goodFriday',
            'christmasDay',
            'victoriaDay',
            'natalHoliday',
        ];

        if ($this->year >= 2015) {
            $holidays[] = 'novaScotiaHeritageDay';
        }

        $this->assertDefinedHolidays($holidays, self::REGION, $this->year, Holiday::TYPE_OFFICIAL);
    }

    /**
     * Tests if all observed holidays in NovaScotia are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testObservedHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_OBSERVANCE);
    }

    /**
     * Tests if all seasonal holidays in NovaScotia are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testSeasonalHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_SEASON);
    }

    /**
     * Tests if all bank holidays in NovaScotia are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testBankHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_BANK);
    }

    /**
     * Tests if all other holidays in NovaScotia are defined by the provider class.
     *
     * @throws ReflectionException
     */
    public function testOtherHolidays(): void
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_OTHER);
    }
}
