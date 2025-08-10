<?php

declare(strict_types=1);

namespace Alluvamz\PayChanguMobile\Data;

use ArrayAccess;
use Countable;
use JsonSerializable;
use Stringable;

abstract class BaseDataObject implements
    ArrayAccess,
    Countable,
    JsonSerializable,
    Stringable
{
    public function __toString(): string
    {
        return (string) json_encode($this->toArray());
    }

    abstract public static function makeFromArray(array $data): self;

    abstract public function toArray(): array;

    public function makeFromString(string $rep): array
    {
        return json_decode($rep, true);
    }

    public function count(): int
    {
        return count($this->toArray());
    }

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->toArray());
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->toArray()[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->{$offset} = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->{$offset});
    }

    public function copy(array $data = []): self
    {
        return static::makeFromArray([
            ...$this->toArray(),
            ...$data,
        ]);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
