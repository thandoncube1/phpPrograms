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
