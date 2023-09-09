
<!-- Abraham Caban Rios
Module 6
9/9/2023 
-->

<!DOCTYPE html>
<html>
<head>
    <title>Abraham Integer Test</title>
</head>
<body>
    <?php
    class AbrahamMyInteger {
        private $value;

        public function __construct($value) {
            $this->value = $value;
        }

        public function isEven() {
            return $this->value % 2 === 0;
        }

        public function isOdd() {
            return $this->value % 2 !== 0;
        }

        public function isPrime() {
            if ($this->value <= 1) {
                return false;
            }

            for ($i = 2; $i * $i <= $this->value; $i++) {
                if ($this->value % $i === 0) {
                    return false;
                }
            }

            return true;
        }

        public function getValue() {
            return $this->value;
        }

        public function setValue($value) {
            $this->value = $value;
        }
    }

    // Create two instances of MyInteger
    $integer1 = new AbrahamMyInteger(7);
    $integer2 = new AbrahamMyInteger(12);
    ?>

    <h2>Integer 1: <?php echo $integer1->getValue(); ?></h2>
    <p>Is Even: <?php echo $integer1->isEven() ? "Yes" : "No"; ?></p>
    <p>Is Odd: <?php echo $integer1->isOdd() ? "Yes" : "No"; ?></p>
    <p>Is Prime: <?php echo $integer1->isPrime() ? "Yes" : "No"; ?></p>

    <br>

    <h2>Integer 2: <?php echo $integer2->getValue(); ?></h2>
    <p>Is Even: <?php echo $integer2->isEven() ? "Yes" : "No"; ?></p>
    <p>Is Odd: <?php echo $integer2->isOdd() ? "Yes" : "No"; ?></p>
    <p>Is Prime: <?php echo $integer2->isPrime() ? "Yes" : "No"; ?></p>
</body>
</html>
