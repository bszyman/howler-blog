<?php

namespace App\Models;
interface BookmarkInterface
{
    public function getId();

    public function getTitle();

    public function getDescription();

    public function getUrl();

    public function getIsPublic();

    public function getImage();
}
