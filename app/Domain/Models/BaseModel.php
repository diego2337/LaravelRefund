<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\MessageBag;
use App\Exceptions\ModelInvalidException;

class BaseModel extends Model
{
    use SoftDeletes;

    const CREATED_AT               = 'created_at';
    const UPDATED_AT               = 'updated_at';
    const DELETED_AT               = 'deleted_at';
    public static $snakeAttributes = false;
    protected $dates               = ['deleted_at'];

    /**
     * Error message bag
     *
     * @var MessageBag
     */
    protected $errors;

    /**
     * It allows you to save only if the model is valid
     */
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (! $model->validate()) {
                throw new ModelInvalidException($model->getErrors());
            }
        });
    }

    /**
     * Validates current attributes against rules
     */
    public function validate()
    {
        $validator = app('validator');

        $v = $validator->make($this->attributesToArray(), $this->rules(), $this->messages());

        $this->extendValidator($v);

        if ($v->passes()) {
            return true;
        }
        $this->setErrors($v->messages());

        return false;
    }

    public function rules(): array
    {
        return [];
    }

    /** Returns the custom messages for validation errors */
    public function messages()
    {
        return [];
    }

    /**
     * @param $v
     */
    public function extendValidator($v)
    {
        return;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set error message bag
     *
     * @var MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        return ! empty($this->errors);
    }
}
