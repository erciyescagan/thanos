# Thanos PHP Library

Thanos is a PHP-based library designed to emulate the power of the Infinity Gauntlet. It allows users to manipulate data using the six Infinity Stones: Mind, Power, Reality, Soul, Space, and Time. Each stone has unique abilities that alter the given data.

## Features

- **Mind Stone**: Reverses text.
- **Power Stone**: Replaces random letters in text with '*'.
- **Reality Stone**: Shuffles characters in text.
- **Soul Stone**: Repeats text one time with dividers.
- **Space Stone**: Adds 2 spaces between characters.
- **Time Stone**: Modifies a date based on the input.

- **Infinity Gauntlet**: Uses all six stones to remove half of the data.

## Installation
```bash
composer require merterciyescagan/thanos
```

## Usage
### Using Individual Stones

#### Mind Stone

```php
$mindStone = new Stone(new Mind());
$mindStone = $mindStone->set("Hello World");
echo $mindStone->use()->getResult(); // Output: "dlroW olleH"; 
echo $mindStone->use(2)->getResult(); // Output: "Hello World"
echo $mindStone->use(2)->use()->getResult(); // Output: "dlroW olleH"
```

#### Power Stone

```php 
$powerStone = new Stone(new Power());
$powerStone = $powerStone->set("Hello World");
echo $powerStone->use()->getResult(); // Output: "Hello Wo*ld"
echo $powerStone->use(2)->getResult(); // Output: "Hell* Wo*ld"
echo $powerStone->use(2)->use()->getResult(); //Output: "He*ll* Wo*ld"
```

#### Reality Stone

```php
$realityStone = new Stone(new Reality());
$realityStone = $realityStone->set("Hello World");
echo $realityStone->use()->getResult(); // Output: Randomly shuffled text
echo $realityStone->use(2)->getResult(); // Output: 2 times randomly shuffled text
echo $realityStone->use(2)->use()->getResult(); // Output: 3 times randomly shuffled text
```

#### Soul Stone

```php
$soulStone = new Stone(new Soul());
$soulStone = $soulStone->set("Hello World");
echo $soulStone->use()->getResult(); // Output: "Hello World | Hello World"
echo $soulStone->use(2)->getResult(); // Output "Hello World | Hello World | Hello World | Hello World"
echo $soulStone->use(2)->use()->getResult(); // Output "Hello World | Hello World | Hello World | Hello World | Hello World | Hello World | Hello World | Hello World"
```

#### Space Stone

```php
$spaceStone = new Stone(new Space());
$spaceStone = $spaceStone->set("Hello World");
echo $spaceStone->use()->getResult(); // Output: "H e l l o   W o r l d"
echo $spaceStone->use(2)->getResult(); // Output: ""H        e        l        l        o                 W        o        r        l        d""
echo $spaceStone->use(2)->use()->getResult(); // Output: "H                          e                          l                          l                          o                                                     W                          o                          r                          l                          d"
```

#### Time Stone

```php
$timeStone = new Stone(new Time());
$timeStone = $timeStone->set(+1);
echo $timeStone->use()->getResult(); // Output: +1 day based on today
echo $timeStone->use(2)->getResult(); // Output: +2 day based on today
echo $timeStone->use(2)->use()->getResult(); // Output: +3 day based on today
```

### Using the Gauntlet

```php
$mindStone = new Stone(new Mind());
$powerStone = new Stone(new Power());
$realityStone = new Stone(new Reality());
$soulStone = new Stone(new Soul());
$spaceStone = new Stone(new Space());
$timeStone = new Stone(new Time());

$gauntlet = new Gauntlet();

$gauntlet->setGauntlet(
    new InfinityGauntlet(), 
    [$mindStone, $powerStone, $realityStone, $soulStone, $spaceStone, $timeStone]
);
$result = $gauntlet->snap(['Iron Man', 'Thor', 'Hulk', 'Black Widow']);
print_r($result); // Random half removed
```

## Requirements
- PHP 8.0+
- Composer

## Contributing
Feel free to fork and submit pull requests. Bug reports and feature requests are welcome!

## License
MIT

