<?php

interface PersistenceInterface
{
    public function set($key, $value);

    public function get($key);

    public function delete($key);

    public function flush();
}