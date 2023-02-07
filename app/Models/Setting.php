<?php

namespace App\Models;

use App\Traits\Contacts\HasContact;
use App\Traits\Files\HasFile;
use App\Traits\Files\HasFiles;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, Translatable, HasFile, HasContact;

    protected $table = 'settings';

    protected $guarded = [];

    public $translatedAttributes = ['website_title', 'address','copyrights','meta_title','meta_description','footer_description'];

    public $timestamps = true;

    public function getLogoAttribute(){
        $logo = $this->file()->where('type','logo')->first();
        return $logo->path;
    }

    public function getFooterImgAttribute(){
        $img = $this->file()->where('type','footer_img')->first();
        return $img->path;
    }

    public function getContactImgAttribute(){
        $img = $this->file()->where('type','contact_img')->first();
        return $img->path;
    }
}
