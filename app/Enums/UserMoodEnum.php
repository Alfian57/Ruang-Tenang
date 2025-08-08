<?php

namespace App\Enums;

enum UserMoodEnum: string
{
    case HAPPY = 'happy';
    case NEUTRAL = 'neutral';
    case ANGRY = 'angry';
    case DISAPPOINTED = 'disappointed';
    case SAD = 'sad';
    case CRYING = 'crying';
}
