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
use Plaf\Contract\Contract;

/**
 * Description of ContractTest
 *
 * @author valeriy
 */
class ContractTest extends PHPUnit_Framework_TestCase
{

    public function testNotNullNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureNotNull(null);
    }

    public function testArrayNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureArray(null);
    }

    public function testBoolNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureBool(null);
    }

    public function testFloatNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureFloat(1);
    }

    public function testIntNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureInt(null);
    }

    public function testNumericNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureNumeric(null);
    }

    public function testObjectNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureObject(null);
    }

    public function testStringNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');

        Contract::ensureString(null);
    }

    public function testNotNullPositive()
    {
        $this->assertTrue(Contract::ensureNotNull(1));
    }

    public function testArrayPositive()
    {
        $this->assertTrue(Contract::ensureArray(array()));
    }

    public function testBoolPositive()
    {
        $this->assertTrue(Contract::ensureBool(false));
    }

    public function testFloatPositive()
    {
        $this->assertTrue(Contract::ensureFloat(1.5));
    }

    public function testIntPositive()
    {
        $this->assertTrue(Contract::ensureInt(100));
    }

    public function testNumericPositive()
    {
        $this->assertTrue(Contract::ensureNumeric(5280));
    }

    public function testObjectPositive()
    {
        $this->assertTrue(Contract::ensureObject(new \stdClass()));
    }

    public function testStringPositive()
    {
        $this->assertTrue(Contract::ensureString('null'));
    }

    public function testInRangePositive()
    {
        $this->assertTrue(Contract::ensureInRange(10, 5, 11));
        $this->assertTrue(Contract::ensureInRange(5, 5, 11));
        $this->assertTrue(Contract::ensureInRange(11, 5, 11));
    }

    public function testInRangeNegativeAbove()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');
        Contract::ensureInRange(12, 5, 11);
    }

    public function testInRangeNegativeBelow()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');
        Contract::ensureInRange(12, 5, 11);
    }

    public function testInSetPositive()
    {
        $this->assertTrue(Contract::ensureInSet(10, array(5, 10, 15)));
        $this->assertTrue(Contract::ensureInSet('Str', array('A', 'B', 'Str')));
        $this->assertTrue(Contract::ensureInSet('10', array(5, 10, 15)));
    }

    public function testInSetStrictPositive()
    {
        $this->assertTrue(Contract::ensureInSet(10, array(5, 10, 15)));
        $this->assertTrue(Contract::ensureInSet('Str', array('A', 'B', 'Str')));
    }

    public function testInSetStrictNegativeTypes()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');
        Contract::ensureInSetStrict('10', array(5, 10, 15));
    }

    public function testInSetStrictNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');
        Contract::ensureInSetStrict(9, array(5, 10, 15));
    }

    public function testInSetNegative()
    {
        $this->setExpectedException('\Plaf\Contract\Exception');
        Contract::ensureInSet(9, array(5, 10, 15));
    }

}
