<?php

namespace CommerceGuys\Intl\Formatter;

use CommerceGuys\Intl\Currency\Currency;
use CommerceGuys\Intl\NumberFormat\NumberFormat;

interface NumberFormatterInterface
{
    /* Format style constants */
    const DECIMAL = 1;
    const PERCENT = 2;
    const CURRENCY = 3;
    const CURRENCY_ACCOUNTING = 4;

    /* Currency display style constants */
    const CURRENCY_DISPLAY_NONE = 0;
    const CURRENCY_DISPLAY_SYMBOL = 1;
    const CURRENCY_DISPLAY_CODE = 2;

    /**
     * Formats a number.
     *
     * Please note that the provided number should already be rounded.
     * This formatter doesn't do any rounding of its own, and will simply
     * truncate extra digits.
     *
     * @param string $number The number.
     *
     * @return string
     */
    public function format($number);

    /**
     * Formats a currency amount.
     *
     * Please note that the provided number should already be rounded.
     * This formatter doesn't do any rounding of its own, and will simply
     * truncate extra digits.
     *
     * @param string   $number   The number.
     * @param Currency $currency The currency.
     *
     * @return string
     */
    public function formatCurrency($number, Currency $currency);

    /**
     * Parses a number.
     *
     * Commonly used in input widgets where the end-user might input
     * a number using digits and symbols common to their locale.
     *
     * @param string $number The number.
     *
     * @return string|false The parsed number or FALSE on error.
     */
    public function parse($number);

    /**
     * Parses a formatted currency amount.
     *
     * Commonly used in input widgets where the end-user might input
     * a number using digits and symbols common to their locale.
     *
     * @param string   $number    The number.
     * @param Currency $currency  The currency.
     *
     * @return string|false The parsed number or FALSE on error.
     */
    public function parseCurrency($number, Currency $currency);

    /**
     * Gets the minimum number of fraction digits.
     *
     * Defaults to 0 for decimal and percentage styles.
     * Defaults to null for currency styles, since the currency number of
     * fraction digits is used as the default in that case.
     *
     * @return int
     */
    public function getMinimumFractionDigits();

    /**
     * Sets the minimum number of fraction digits.
     *
     * @param int $minimumFractionDigits
     *
     * @return self
     */
    public function setMinimumFractionDigits($minimumFractionDigits);

    /**
     * Gets the maximum number of fraction digits.
     *
     * Defaults to 3 for decimal and percentage styles.
     * Defaults to null for currency styles, since the currency number of
     * fraction digits is used as the default in that case.
     *
     * @return int
     */
    public function getMaximumFractionDigits();

    /**
     * Sets the maximum number of fraction digits.
     *
     * @param int $maximumFractionDigits
     *
     * @return self
     */
    public function setMaximumFractionDigits($maximumFractionDigits);

    /**
     * Gets whether the major digits will be grouped.
     *
     * @return bool
     */
    public function isGroupingUsed();

    /**
     * Sets whether or not major digits should be grouped.
     *
     * @param bool $groupingUsed
     *
     * @return self
     */
    public function setGroupingUsed($groupingUsed);

    /**
     * Gets the currency display style.
     *
     * Controls whether a currency amount will be shown with the
     * currency symbol (CURRENCY_DISPLAY_SYMBOL) or the
     * currency code (CURRENCY_DISPLAY_CODE).
     *
     * @return int
     */
    public function getCurrencyDisplay();

    /**
     * Sets the currency display style.
     *
     * @param int $currencyDisplay One of the CURRENCY_DISPLAY_ constants.
     *
     * @return self
     */
    public function setCurrencyDisplay($currencyDisplay);
}
