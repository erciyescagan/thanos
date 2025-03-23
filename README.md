# Thanos PHP Library

Thanos PHP Library is a fun and lightweight implementation of the Infinity Gauntlet concept in PHP. It allows developers to "snap" data using various Infinity Stones, each with unique transformations.

## Features
- Implements the six Infinity Stones: Mind, Power, Reality, Soul, Space, and Time.
- Each stone provides a different transformation method.
- Gauntlet requires all stones to be set before usage.
- `InfinityGauntlet::snap($data)` randomly removes half of the data elements, simulating the Thanos snap.

## Installation
```bash
composer require merterciyescagan/thanos
```

## Usage of Stones
```php

$mind = new Mind(); //Same for all single stones.

$mind->use();

```

## Usage of Gauntlet
```php
use thanos\core\Gauntlet;
use thanos\gauntlets\InfinityGauntlet;
use thanos\stones\{Mind, Power, Reality, Soul, Space, Time};

$stones = [
    new Mind(),
    new Power(),
    new Reality(),
    new Soul(),
    new Space(),
    new Time()
];

$gauntlet = new InfinityGauntlet();
$gauntlet->setGauntlet($gauntlet, $stones);

$data = ['Iron Man', 'Thor', 'Hulk', 'Captain America', 'Black Widow', 'Hawkeye'];

$snappedData = $gauntlet->snap($data);

print_r($snappedData);

```

## Infinity Stones Effects
- **Mind**: Reverses the string.
- **Power**: Adds a random power emoji to the string.
- **Reality**: Shuffles the characters.
- **Soul**: Repeats the string multiple times.
- **Space**: Adds random spaces between characters.
- **Time**: Modifies a given date string.

## License
This project is licensed under the MIT License.

