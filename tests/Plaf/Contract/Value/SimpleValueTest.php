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
use Plaf\Contract\Value\SimpleValue as Value;

/**
 * Test for \Plaf\Value
 *
 * @author valeriy
 */
class SimpleValueTest extends PHPUnit_Framework_TestCase
{

    private $valueNull;
    private $valueFloat;
    private $valueZero;
    private $valueBool;
    private $valueEmptyString;
    private $valueArray;
    private $valueObject;

    public function initValues()
    {
        $this->valueNull = new Value(null);
        $this->valueFloat = new Value(1.3);
        $this->valueZero = new Value(0);
        $this->valueBool = new Value(false);
        $this->valueEmptyString = new Value('');
        $this->valueArray = new Value(array());
        $this->valueObject = new Value(new stdClass());
    }

    public function testIsNull()
    {
        $this->initValues();

        $this->assertTrue($this->valueNull->isNull());
        $this->assertFalse($this->valueFloat->isNull());
        $this->assertFalse($this->valueZero->isNull());
        $this->assertFalse($this->valueBool->isNull());
        $this->assertFalse($this->valueEmptyString->isNull());
        $this->assertFalse($this->valueArray->isNull());
        $this->assertFalse($this->valueObject->isNull());
    }

    public function testIsArray()
    {
        $this->initValues();

        $this->assertTrue($this->valueArray->isArray());
        $this->assertFalse($this->valueFloat->isArray());
        $this->assertFalse($this->valueNull->isArray());
        $this->assertFalse($this->valueZero->isArray());
        $this->assertFalse($this->valueBool->isArray());
        $this->assertFalse($this->valueEmptyString->isArray());
        $this->assertFalse($this->valueObject->isArray());
    }

    public function testIsBool()
    {
        $this->initValues();

        $this->assertTrue($this->valueBool->isBool());
        $this->assertFalse($this->valueFloat->isBool());
        $this->assertFalse($this->valueArray->isBool());
        $this->assertFalse($this->valueNull->isBool());
        $this->assertFalse($this->valueZero->isBool());
        $this->assertFalse($this->valueEmptyString->isBool());
        $this->assertFalse($this->valueObject->isBool());
    }

    public function testIsFloat()
    {
        $this->initValues();

        $this->assertTrue($this->valueFloat->isFloat());
        $this->assertFalse($this->valueArray->isFloat());
        $this->assertFalse($this->valueNull->isFloat());
        $this->assertFalse($this->valueZero->isFloat());
        $this->assertFalse($this->valueBool->isFloat());
        $this->assertFalse($this->valueEmptyString->isFloat());
        $this->assertFalse($this->valueObject->isFloat());
    }

    public function testIsInt()
    {
        $this->initValues();

        $this->assertTrue($this->valueZero->isInt());
        $this->assertFalse($this->valueFloat->isInt());
        $this->assertFalse($this->valueArray->isInt());
        $this->assertFalse($this->valueNull->isInt());
        $this->assertFalse($this->valueBool->isInt());
        $this->assertFalse($this->valueEmptyString->isInt());
        $this->assertFalse($this->valueObject->isInt());
    }

    public function testIsNumeric()
    {
        $this->initValues();

        $this->assertTrue($this->valueFloat->isNumeric());
        $this->assertFalse($this->valueArray->isNumeric());
        $this->assertFalse($this->valueNull->isNumeric());
        $this->assertTrue($this->valueZero->isNumeric());
        $this->assertFalse($this->valueBool->isNumeric());
        $this->assertFalse($this->valueEmptyString->isNumeric());
        $this->assertFalse($this->valueObject->isNumeric());
    }

    public function testIsString()
    {
        $this->initValues();

        $this->assertFalse($this->valueFloat->isString());
        $this->assertFalse($this->valueArray->isString());
        $this->assertFalse($this->valueNull->isString());
        $this->assertFalse($this->valueZero->isString());
        $this->assertFalse($this->valueBool->isString());
        $this->assertTrue($this->valueEmptyString->isString());
        $this->assertFalse($this->valueObject->isString());
    }

    public function testIsObject()
    {
        $this->initValues();

        $this->assertFalse($this->valueFloat->isObject());
        $this->assertFalse($this->valueArray->isObject());
        $this->assertFalse($this->valueNull->isObject());
        $this->assertFalse($this->valueZero->isObject());
        $this->assertFalse($this->valueBool->isObject());
        $this->assertFalse($this->valueEmptyString->isObject());
        $this->assertTrue($this->valueObject->isObject());
    }

    public function testIsA()
    {
        $valueS = new Value(new \stdClass());
        $this->assertTrue($valueS->isA('\stdClass'));

        $valueA = new Value(new \ArrayObject());
        $this->assertTrue($valueA->isA('\ArrayObject'));
    }

    public function testGetValue()
    {
        $inI = 5280;

        $valueI = new Value($inI);
        $this->assertEquals($inI, $valueI->getValue());

        $inO = new stdClass();

        $valueO = new Value($inO);
        $this->assertEquals($inO, $valueO->getValue());
    }

}

