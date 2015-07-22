<?php

/**
 * @license     http://opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/nicoSWD
 * @since       0.3
 * @author      Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\Rules\Tokens;

use nicoSWD\Rules\Constants;

/**
 * Class TokenOr
 * @package nicoSWD\Rules\Tokens
 */
final class TokenOr extends BaseToken
{
    /**
     * @return int
     */
    public function getGroup()
    {
        return Constants::GROUP_LOGICAL;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return '|';
    }
}