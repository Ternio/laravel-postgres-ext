<?php

namespace YuryKabanov\Database\Query;

use Illuminate\Database\Query\Builder as BaseBuilder;

class Builder extends BaseBuilder {
    public function upsert(array $values, $unique) {
        if (empty($values)) {
            return true;
        }

        if (! is_array(reset($values))) {
            $values = [$values];
        } else {
            foreach ($values as $key => $value) {
                ksort($value);
                $values[$key] = $value;
            }
        }

        $bindings = [];

        foreach ($values as $record) {
            foreach ($record as $value) {
                $bindings[] = $value;
            }
        }

        $sql = $this->grammar->compileUpsert($this, $values, $unique);

        $bindings = $this->cleanBindings($bindings);

        // we can use insert since upsert is customized insert
        return $this->connection->insert($sql, $bindings);
    }
}