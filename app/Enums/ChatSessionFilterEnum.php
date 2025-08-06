<?php

namespace App\Enums;

enum ChatSessionFilterEnum: string
{
    case ALL = 'all';
    case BOOKMARKED = 'bookmarked';
    case FAVORITED = 'favorited';
    case DELETED = 'deleted';
}
