<?php
// core/Database.php

class Database
{
    private $connection;

    public function __construct($config)
    {
        $this->connection = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    public function escape($value)
    {
        return $this->connection->real_escape_string($value);
    }

    public function fetchAll($table)
    {
        $sql = "SELECT * FROM " . $this->escape($table);
        $result = $this->query($sql);

        if (!$result) {
            return [];
        }

        $records = [];
        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }

        return $records;
    }

    public function fetchRow($table, $conditions = [])
    {
        $whereClause = $this->buildWhereClause($conditions);
        $sql = "SELECT * FROM " . $this->escape($table) . $whereClause . " LIMIT 1";
        $result = $this->query($sql);

        if (!$result) {
            return null;
        }

        return $result->fetch_assoc();
    }

    public function insert($table, $data)
    {
        $fields = [];
        $values = [];
        foreach ($data as $field => $value) {
            $fields[] = $this->escape($field);
            $values[] = "'" . $this->escape($value) . "'";
        }

        $sql = "INSERT INTO " . $this->escape($table) . " (" . implode(',', $fields) . ") VALUES (" . implode(',', $values) . ")";
        return $this->query($sql);
    }

    public function update($table, $data, $conditions = [])
    {
        $setClause = $this->buildSetClause($data);
        $whereClause = $this->buildWhereClause($conditions);
        $sql = "UPDATE " . $this->escape($table) . " SET " . $setClause . $whereClause;
        return $this->query($sql);
    }

    public function delete($table, $conditions = [])
    {
        $whereClause = $this->buildWhereClause($conditions);
        $sql = "DELETE FROM " . $this->escape($table) . $whereClause;
        return $this->query($sql);
    }

    private function buildSetClause($data)
    {
        $setFields = [];
        foreach ($data as $field => $value) {
            $setFields[] = $this->escape($field) . "='" . $this->escape($value) . "'";
        }

        return implode(',', $setFields);
    }

    private function buildWhereClause($conditions)
    {
        if (empty($conditions)) {
            return "";
        }

        $whereClause = " WHERE ";
        $whereConditions = [];
        foreach ($conditions as $field => $value) {
            $whereConditions[] = $this->escape($field) . "='" . $this->escape($value) . "'";
        }

        return $whereClause . implode(' AND ', $whereConditions);
    }
}
