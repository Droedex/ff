<?php

declare(strict_types=1);

namespace Droedex\FF\Repository\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelResolverHelper
{
    /**
     * app model path
     */
    public const APP_MODEL = 'App\\Models\\';

    /**
     * default model dir
     */
    public const APP_DEFAULT_MODEL_DIR = 'App\\';

    /**
     * Get model source if exists
     *
     * @param string $model Model
     *
     * @return string
     */
    private function getModel(string $model): string
    {
        $className = self::APP_MODEL . Str::studly($model);

        if (!class_exists($className)) {
            $className = self::APP_DEFAULT_MODEL_DIR . Str::studly($model);

            if (!class_exists($className)) {
                throw new \RuntimeException("Feature map class [$className] not found!");
            }
        }

        if (!is_subclass_of($className, Model::class)) {
            throw new \InvalidArgumentException("Class [$className] is not an Eloquent model.");
        }

        return $className;
    }

    /**
     * Model resolver
     *
     * @param $modelName
     *
     * @return string
     */
    public static function resolve($modelName): string
    {
        return (new self())->getModel($modelName);
    }
}