<?php

namespace App\Interfaces;

interface TaskServiceInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function getAll();
}
