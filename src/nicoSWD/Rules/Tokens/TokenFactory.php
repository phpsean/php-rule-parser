<?php

/**
 * @license     http://opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/nicoSWD
 * @since       0.3.5
 * @author      Nicolas Oelgart <nico@oelgart.com>
 */
namespace nicoSWD\Rules\Tokens;

use nicoSWD\Rules\Exceptions\ParserException;
use nicoSWD\Rules\AST\TokenCollection;

/**
 * Class TokenFactory
 * @package nicoSWD\Rules\Tokens
 */
final class TokenFactory
{
    /**
     * @param mixed $value
     * @return BaseToken
     * @throws ParserException
     */
    public static function createFromPHPType($value)
    {
        switch ($type = gettype($value)) {
            case 'string':
                $current = new TokenString($value);
                break;
            case 'integer':
                $current = new TokenInteger($value);
                break;
            case 'boolean':
                $current = new TokenBool($value);
                break;
            case 'NULL':
                $current = new TokenNull($value);
                break;
            case 'double':
                $current = new TokenFloat($value);
                break;
            case 'array':
                $params = new TokenCollection();

                foreach ($value as $item) {
                    $params->attach(static::createFromPHPType($item));
                }

                $current = new TokenArray($params);
                break;
            default:
                throw new ParserException(sprintf(
                    'Unsupported PHP type: "%s"',
                    $type
                ));
        }

        return $current;
    }
}
