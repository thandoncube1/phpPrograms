<?php

// Create a function with default values in the function signature
function get_book_title($isbn, $error = 'Unable to query'): string
{
  try {
    $connection = true;
    $book = "Found the Book";
    if ($connection)
      return $book;
  } catch (error) {
    return $error;
  }
}

echo get_book_title('978-1-098-12132-7');

// This has been depricated (Default or optional arguments should be declared)
// At the end, last arguments. 
function brew_latte($flavor = 'unflavored', $shots)
{
  return  PHP_EOL . "Brewing a {$shots}-shots, $flavor latte!";
}

print brew_latte('vanilla', 2);

echo PHP_EOL . array_fill(start_index: 0, count: 100, value: 50);

// Passing a variable between scopes with use()
// By default, closures do not inherit any scope from parent application and, like
// regular functions, define variables within their own scope. Variables from parent
// scope can be accessed directly into a closure by leveraging the `use()` directive
// when defining a function.

$some_value = 42;

$foo = function () {
  echo $some_value . PHP_EOL;
};

$bar = function () use ($some_value) {
  echo $some_value . PHP_EOL;
};

$foo();

$bar();

// Passing functions as Parameters to Other functions
// You want to define part of a function's implementation and pass that implementation
// as an argument to another function.
// Solution: Define a closure that implements part of the logic you need and pass that directly
// into another function as if it were a variable:

$reducer = function (?int $carry, int $item): int {
  return $carry + $item;
};

function reduce(array $array, callable $callback, ?int $initial = null)
{
  $acc = $initial;
  foreach ($array as $item) {
    $acc = $callback($acc, $item);
  }

  return $acc;
}

$list = [1, 2, 3, 4, 5];
$sum = reduce($list, $reducer);

echo $sum . PHP_EOL;

// Walk throughh carrying in PHP
function multiply(int $x, int $y): int
{
  return $x * $y;
}

echo multiply(7, 3);

echo "" . PHP_EOL;


function carried_multiply(int $x): callable
{
  return function (int $y) use ($x): int {
    return $x * $y;
  };
}

echo carried_multiply(7)(3);
