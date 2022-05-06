<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model implements BookmarkInterface
{
    use Uuids;

    const ATTR_TITLE = "title";
    const ATTR_DESCRIPTION = "description";
    const ATTR_URL = "url";
    const ATTR_PUBLIC = "public";
    const ATTR_IMAGE = "image";

    protected $fillable = [
        self::ATTR_TITLE,
        self::ATTR_DESCRIPTION,
        self::ATTR_URL,
        self::ATTR_PUBLIC,
        self::ATTR_IMAGE
    ];

    public function getId()
    {
        return $this->getKey();
    }

    public function getTitle()
    {
        return $this->{self::ATTR_TITLE};
    }

    public function getDescription()
    {
        return $this->{self::ATTR_DESCRIPTION};
    }

    public function getUrl()
    {
        return $this->{self::ATTR_URL};
    }

    public function getIsPublic()
    {
        return $this->{self::ATTR_PUBLIC};
    }

    public function getImage()
    {
        return $this->{self::ATTR_IMAGE};
    }
}
