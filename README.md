# Enum Descriptions

This package adds descriptions to PHP Enums by utilizing a `Description` attribute.

## To Install
Use composer to install this package by running the following command:

`composer require anteris-dev/enum-descriptions`

## Getting Started
You may specify a description for a case by using the `Description` attribute as shown below. If no description is set on the case, its name will be split by uppercase letters, joined with spaces, and then the first word will be capitalized (e.g., `someValue` becomes `Some value`).

```php
use AnterisDev\EnumDescriptions\Description;

enum Animal
{
    #[Description('A cute dog.')]
    case Dog;
    
    #[Description('A fuzzy cat.')]
    case Cat;
}
```

## Retrieving Descriptions
There are several helpers that will assist you with retrieving descriptions. First are the global functions.

### Global Functions
 ```php
// Accepts an enum class name and returns an array. Enum values are represented in the array keys
// and enum descriptions are represented as those key values.
 enum_descriptions(Animal::class);

// Returns the string description for the specific enum passed.
enum_description(Animal::Dog);
 ```

### Traits
You may also add the `HasDescriptions` trait to your enum to expose some helpful functions there.

```php
use AnterisDev\EnumDescriptions\HasDescriptions;

enum Animal
{
    use HasDescriptions;
}

// Returns an array. Enum values are represented in the array keys and enum
// descriptions are represented as those key values.
Animal::descriptions();

// Returns the description for the specific value specified.
Animal::Dog->description();
```