<?php

namespace Droedex\FF\Enums;

use Droedex\FF\FeatureSet\FeatureCreate;
use Droedex\FF\FeatureSet\FeatureDelete;
use Droedex\FF\FeatureSet\FeatureList;
use Droedex\FF\FeatureSet\FeatureRead;
use Droedex\FF\FeatureSet\FeatureUpdate;

enum FeaturesEnum: string
{
    case CREATE = 'create';
    case READ   = 'read';
    case UPDATE = 'update';
    case DELETE = 'delete';
    case List   = 'list';

    private const QUERY_MAP = [
        self::READ->value => FeatureRead::class,
        self::List->value => FeatureList::class,
    ];

    private const COMMANDS_MAP = [
        self::CREATE->value => FeatureCreate::class,
        self::UPDATE->value => FeatureUpdate::class,
        self::DELETE->value => FeatureDelete::class,
    ];

    private const MAP = [
        self::CREATE->value => FeatureCreate::class,
        self::READ->value   => FeatureRead::class,
        self::UPDATE->value => FeatureUpdate::class,
        self::DELETE->value => FeatureDelete::class,
        self::List->value   => FeatureList::class,
    ];

    public function getClassName(): string
    {
        return self::MAP[$this->value];
    }

    public function getQuery(): string
    {
        return self::QUERY_MAP[$this->value];
    }

    public function getCommand(): string
    {
        return self::COMMANDS_MAP[$this->value];
    }
}
