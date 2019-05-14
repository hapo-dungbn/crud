<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function getDateConvertAttribute() {
        $time = Carbon::parse($this->dob)->format('d/m/Y');
        return $time;
    }

    public function getCreatTimeAttribute() {
        $time = Carbon::parse($this->created_at)->format('d/m/Y');
        return $time;
    }

    public function getUpdateTimeAttribute() {
        $time = Carbon::parse($this->updated_at)->format('d/m/Y');
        return $time;
    }
}
