<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model implements FriendInterface
{
    use Uuids;

    const ATTR_NAME = "name";
    const ATTR_URL = "url";

    protected $fillable = [
        self::ATTR_NAME,
        self::ATTR_URL
    ];

    public function getId()
    {
        return $this->getKey();
    }

    public function getName()
    {
        return $this->{self::ATTR_NAME};
    }

    public function getUrl()
    {
        return $this->{self::ATTR_URL};
    }

    public function getImageUrl()
    {
        return "";
    }
}
