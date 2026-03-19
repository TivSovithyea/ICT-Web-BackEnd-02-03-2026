<?php

interface ISerializable
{
    public function serialize();
    public function unserialize($data);
}

interface ILoggable
{
    public function toLog();
}

class Order implements ISerializable, ILoggable
{
    public function __construct(protected $id, protected $total) {}

    public function serialize()
    {
        return json_encode([
            'id' => $this->id,
            'total' => $this->total
        ]);
    }

    public function unserialize($data)
    {
        $d = json_decode($data, true);
        return new static($d['id'], $d['total']);
    }

    public function toLog()
    {
        return [
            'id' => $this->id,
            'total' => $this->total
        ];
    }
}

function process($o)
{
    echo $o->serialize();
    echo "<br>";
    print_r($o->unserialize(json_encode(["id" => 99, "total" => 10000])));
}
function audit($o)
{
    echo implode(' ', $o->toLog());
}


$o = new Order(42, 99.99);
process($o);
echo "<br>";
audit($o);   // Order satisfies both
