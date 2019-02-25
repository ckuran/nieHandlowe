<?php

namespace ckuran;

use Symfony\Component\Yaml\Yaml;

class PolishSundayProvider
{
    private $data;
    private $today;
    private $timezone;

    public function __construct()
    {
        $this->data = Yaml::parseFile(__DIR__ . '/../data/2019.yaml', Yaml::PARSE_DATETIME);
        $this->today = new \DateTimeImmutable('00:00:00');
        $this->timezone = new \DateTimeZone('UTC');
    }

    public function isNonTradeable(\DateTimeInterface $date)
    {
        if ($this->today != $date) {
            $date = new \DateTimeImmutable($date->format('Y-m-d'), $this->timezone);
        }

        return in_array($date, $this->data,  false);
    }
}
