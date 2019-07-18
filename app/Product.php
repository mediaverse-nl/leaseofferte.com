<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['*'];

    public function images($amount = '*')
    {
        $images = [];
        if(!empty($this->images)){
//            dd(explode(',', $this->images));
            $i = 1;
            foreach (explode(',', $this->images) as $image) {

                if ($amount == '*'){
                    $images[] = $image;
                }elseif ($i <= $amount){
                    $images[] = $image;
                }
//                dd(1);
                $i++;
            }
        }else{
            $images = null;
        }
//        dd(1);
        return $images;
    }
    public function thumbnail()
    {
        return $this->images(1)[0];
    }
}
