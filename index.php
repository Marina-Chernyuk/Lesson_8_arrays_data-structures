<?php
// Задание 1. Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.

public function catalogs (string $dir, string $marker): void
{
    foreach (new DirectoryIterator($dir) as $item) {
        echo $marker . $item->getFilename() . "\n";
        if ($item->isDir()) {
            $currentDir = $item->getPath();
            $currentMarker = $marker . "-";
            $this->catalogs($currentDir, $currentMarker);
        }
    }
}

$this->catalogs("/", "-");

/* Задание 2. Определить сложность следующих алгоритмов:
        - поиск элемента массива с известным индексом,
        - дублирование массива через foreach,
        - рекурсивная функция нахождения факториала числа. ###
*/

    // Поиск элемента массива с известным индексом. Сложность алгоритма O(N)

    $array = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    echo "результат поиска элемента с известным индексом " . $array[2] . PHP_EOL;

    
    // Дублирование массива через foreach. Сложность алгоритма O(N), т.к. алгоритм перебирает все элементы 1 раз
    
    $newArray = [];
    
    foreach ($array as $value) {
        array_push($newArray, $value);
    }
    
    echo "Дублирование массива: " . PHP_EOL;
    print_r($newArray) . PHP_EOL;

    
    //рекурсивная функция нахождения факториала числа.Сложность алгоритма - O(N)
    
    function findFactorial($n)
    {
        if ($n <= 0) {
            return 1;
        }
        return $n * findFactorial($n - 1);
    }
    
    echo "Результат рекурсивной функции " . findFactorial(4) . PHP_EOL;

// Задание 3 Определить сложность следующих алгоритмов. Сколько произойдет итераций? 

// 1) сложность - вложенность (умножение) N*logN =  O(NLogN)

$n = 100;
$array[]= [];

//log(n)
for ($i = 0; $i < $n; $i++) {
    for ($j = 1; $j < $n; $j *= 2) {
        $array[$i][$j]= true;
    } }

// 2) сложность O(N*N) = O(N^2)

$n = 100;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) { // n/2 = n
    for ($j = $i; $j < $n; $j++) { // n
        $array[$i][$j]= true;
    } }



/* Задание 4. Простые делители числа 13195 — 5, 7, 13 и 29. 
Каков самый большой делитель числа 600851475143, являющийся простым числом? */

    $number = 600851475143;

    class NumberDivisors {
        protected $number;
        protected $stack;

        public function __construct($number)
        {
            $this->number = $number;
            $this->stack = new SplStack();
        }

        public function getMaxPF()
        {
            for ($i = 2; $i <= sqrt($this->number); $i++) {
                while ($this->number % $i == 0) {
                    $this->stack->push($i);
                    $this->number /= $i;
                }
            }

            if ($this->number != 1) {
                $this->stack->push($this->number);
            }

            return $this->stack->pop();
        }
    }

    $task = new NumberDivisors($number);

    echo $task->getMaxPF();
