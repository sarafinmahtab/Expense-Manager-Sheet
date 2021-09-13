<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps=false;
    // public $table="tableName";

    // Mutator
    /*
    public function setRemarksAttribute($value) {
        $value = str_replace('\'', '&apos;', $value);
        $value = str_replace('"', '&quot;', $value);
        $this->attributes['remarks'] = $value;
    }
    */

    // Accessors
    public function getRemarksAttribute($value) {
        $value = str_replace('\'', '&apos;', $value);
        $value = str_replace('"', '&quot;', $value);
        return $value;
    }
}
