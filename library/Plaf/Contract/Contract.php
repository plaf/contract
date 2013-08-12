<?php

/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package    Pfal
 * @subpackage Contract
 * @author     Valeriy Tverdohleb <tvsdesign@gmail.com>
 */

namespace Plaf\Contract;

use Plaf\Contract\Exception as ContractException;
use Plaf\Contract\Value\SimpleValue as Value;

final class Contract
{

    /**
     * Simple assertion that throws exception if not succeeded
     *
     * @param bool $expression Expression to be checked for validity
     *
     * @return boolean
     * @throws ContractException
     */
    private static function ensure($expression)
    {
        if (!$expression) {
            throw new ContractException('');
        }
        return true;
    }

    /**
     * Helper function to construct message on contract violation
     *
     * @param \Plaf\Contract\Exception $exception Exception to be commented
     *
     * @return string
     */
    private static function getExceptionComment(ContractException $exception)
    {
        $trace = $exception->getTrace();
        $actualPoint = $trace[1];
        return 'Contract ' . $actualPoint['function'] . ' violation in '
                . $actualPoint['file']
                . ' at line ' . $actualPoint['line'] . '.';
    }

    /**
     * Ensures that argument passed is not null
     *
     * @param mixed $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureNotNull($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure(!$valueObject->isNull());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that argument passed is a numeric value
     *
     * @param mixed $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureNumeric($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure($valueObject->isNumeric());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that argument passed is a string value
     *
     * @param string $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureString($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure($valueObject->isString());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that argument passed is a strict boolean value
     *
     * @param bool $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureBool($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure($valueObject->isBool());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that argument passed is an array
     *
     * @param array $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureArray($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure($valueObject->isArray());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that argument passed is a correct int value
     *
     * @param int $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureInt($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure($valueObject->isInt());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that argument passed is a correct float value
     *
     * @param float $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureFloat($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure($valueObject->isFloat());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that argument passed is an object
     *
     * @param object $value Value to check
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureObject($value)
    {
        $valueObject = new Value($value);
        try {
            self::ensure($valueObject->isObject());
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that value passed are in range [$min, $max]
     *
     * @param number $value Value to check
     * @param number $min   Left range boundary
     * @param number $max   Right range boundary
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureInRange($value, $min, $max)
    {
        try {
            self::ensure($value >= $min && $value <= $max);
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that value passed is listed in array provided,
     * with type conversion
     *
     * @param mixed $value Value to check
     * @param array $set   Set to match value with
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureInSet($value, $set)
    {
        try {
            self::ensure(in_array($value, $set, false));
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

    /**
     * Ensures that value passed is listed in array provided,
     * without type conversion
     *
     * @param mixed $value Value to check
     * @param array $set   Set to match value with
     *
     * @return boolean
     * @throws ContractException
     */
    public static function ensureInSetStrict($value, $set)
    {
        try {
            self::ensure(in_array($value, $set, true));
        } catch (ContractException $exception) {
            $message = self::getExceptionComment($exception);
            throw new ContractException($message);
        }
        return true;
    }

}
