<?php

namespace App\Repositories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class DepartmentRepository extends BaseRepository
{
    protected $dataSearch = [];
    private $department = null;

    public function __construct(Department $department)
    {
        $this->department = $department;
        $this->dataSearch = ['name'];
        parent::__construct($department , $this->dataSearch);
    }

}
