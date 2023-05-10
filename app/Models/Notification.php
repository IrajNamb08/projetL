<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    protected $fillable = ['message', 'lu', 'user_id'];
    use HasFactory;
    function NotifTime() {
        $full = false;
        $now = new DateTime;
        $ago = new DateTime($this->created_at);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'an',
            'm' => 'mois',
            'w' => 'semaine',
            'd' => 'jour',
            'h' => 'heure',
            'i' => 'minute',
            's' => 'seconde',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? 'Il y a ' . implode(', ', $string)  : 'maintenant';
    }
    public function lu()
    {
        $this->lu = 1;
    }
}
