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

namespace Plaf\Contract\Value;

/**
 * Match value against list of rules
 */
class SimpleValue
{

    private $storedValue;

    /**
     * Create value container
     *
     * @param mixed $value Value to store
     */
    public function __construct($value)
    {
        $this->storedValue = $value;
    }

    /**
     * Check if stored value is null
     *
     * @return bool
     */
    public function isNull()
    {
        return is_null($this->storedValue);
    }

    /**
     * Check if stored value is array
     *
     * @return bool
     */
    public function isArray()
    {
        return is_array($this->storedValue);
    }

    /**
     * Check if stored value is bool
     *
     * @return bool
     */
    public function isBool()
    {
        return is_bool($this->storedValue);
    }

    /**
     * Check if stored value is float
     *
     * @return bool
     */
    public function isFloat()
    {
        return is_float($this->storedValue);
    }

    /**
     * Check if stored value is int
     *
     * @return bool
     */
    public function isInt()
    {
        return is_int($this->storedValue);
    }

    /**
     * Check if stored value is numeric
     *
     * @return bool
     */
    public function isNumeric()
    {
        return is_numeric($this->storedValue);
    }

    /**
     * Check if stored value is string
     *
     * @return bool
     */
    public function isString()
    {
        return is_string($this->storedValue);
    }

    /**
     * Check if stored value is object
     *
     * @return bool
     */
    public function isObject()
    {
        return is_object($this->storedValue);
    }

    /**
     * Check if stored value is an instance of specified class or has specified
     * class in it's parents
     *
     * @param string $className Class name to match
     *
     * @return bool
     */
    public function isA($className)
    {
        return is_a($this->storedValue, $className);
    }

    /**
     * Return stored value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->storedValue;
    }

}
