Plaf\Contract
========

# Simple contracts for PHP
A part of Plaf - PHP library: Additional functionality

Functionality for ensuring contract compliance in terms of value type / range
constraints. It should not be treated as validation, but specification of usage
boundaries for programmers. Correctly covered code will behave predictable:
it will work as designed by it's author or not work at all.

## Usage example:

    use Plaf\Contract\Contract;

    class EntitySaver {

        public function saveEntity($entity) {
            Contract::ensureNotNull($entity);
        }

    }


    use Plaf\Contract\Contract;

    class Order {

        const STATE_NEW;
        const STATE_PREPARING;
        const STATE_SHIPPED;
        const STATE_COMPLETED;

        private $state;

        public function setState($state) {
            Contract::ensureInArray($state, array(
                self::STATE_NEW,
                self::STATE_PREPARING,
                self::STATE_SHIPPED,
                self::STATE_COMPLETED
            ));
        }

    }
