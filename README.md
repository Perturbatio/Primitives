# Primitive Types

A collection of PHP primitive Types with common transformations.


Currently available primitives:

1. Distance
2. Mass
3. Temperature
4. Volume

TODO:

1. many more examples
2. More tests
3. Create formatter methods for each of the classes

## Examples

Examples for each Type can be found in the `/examples` folder

### Simple weight conversion

```PHP
$productWeight = Mass::createFromGrams(1600);

echo 'Product weight: ', number_format($productWeight->toKilograms(), 2), "kg \n";
```
