<?php

namespace App\Models;
interface PostInterface
{
    public function getId();

    public function getPostText();

    public function getQuoteFrom();

    public function getPublished();

    public function getParent();
}
