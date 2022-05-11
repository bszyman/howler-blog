<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements PostInterface
{
    use Uuids;

    const ATTR_POST_TEXT = "post_text";
    const ATTR_QUOTE_FROM = "quote_from";
    const ATTR_PUBLISHED = "published";
    const ATTR_PARENT = "parent";

    protected $fillable = [
        self::ATTR_POST_TEXT,
        self::ATTR_QUOTE_FROM,
        self::ATTR_PUBLISHED
    ];

    public function getId()
    {
        return $this->getKey();
    }

    public function getPostText()
    {
        return $this->{self::ATTR_POST_TEXT};
    }

    public function getQuoteFrom()
    {
        return $this->{self::ATTR_QUOTE_FROM};
    }

    public function getPublished()
    {
        return $this->{self::ATTR_PUBLISHED};
    }

    public function getParent()
    {
        return $this->{self::ATTR_PARENT};
    }

    public function wasEdited()
    {
        return $this->created_at->format("U") !== $this->updated_at->format("U");
    }

    public function getPostDate()
    {
        return $this->created_at->format("n/j/Y") . " at " . $this->created_at->format("g:i a");
    }

    public function getEditDate()
    {
        return $this->updated_at->format("n/j/Y") . " at " . $this->updated_at->format("g:i a");
    }

    public function getSummary(): string {
        if (strlen($this->post_text) > 100) {
            return substr($this->post_text, 0, 97) . "...";
        } else {
            return $this->post_text;
        }
    }

    public function getDateCreatedAs2822(): string
    {
        return $this->created_at->format(\DateTime::RFC2822);
    }

    public function getDateCreatedAsIso(): string
    {
        return $this->created_at->format(\DateTime::ATOM);
    }

    public function getDateUpdatedAsIso(): string
    {
        return $this->updated_at->format(\DateTime::ATOM);
    }
}
