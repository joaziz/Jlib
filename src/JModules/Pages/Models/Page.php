<?php

namespace Jlib\JModules\Pages\Models;


use Illuminate\Http\Request;
use Jlib\Model\BaseModel;
use Jlib\JModules\Pages\Models\Template;

class Page extends BaseModel
{

    protected $hidden = [];
    protected $table = 'pages';
    protected $fillable = ['title','content','status','meta','slug','template','publish_date','css','js'];

    public function template(){
        return $this->belongsTo(Template::class);
    }
    public static function getBySlug($slug)
    {
        $page = self::where('slug',$slug)->first();

        if(!$page || $page->status != 1)
            return null;

       return  ($page->template_id !== 0) ?str_replace('[content]', $page->content, $page->template->content): $template = $page->content;

    }
    public static function Generation_url($str, $replace=array(), $delimiter='-'){
        $pages = self::pluck('id','slug')->toArray();
        $i=0;
        $url="";
        do {
            if (!empty($replace)) {
                $str = ($i==0)?str_replace((array)$replace, ' ', $str):@$url;
            }
            $url = str_slug($str);
            $url = ($i!=0)?$url.'_'.$i:$url;
        $i++;
        }while(array_key_exists($url, $pages) == true);
        return $url;
    }
}