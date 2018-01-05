<?php 
function add_meta_title ($string)
{
    $CI =& get_instance();
    $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}
function btn_edit($uri){
	return anchor($uri,'<span class="glyphicon glyphicon-edit "></span>');
}
function btn_delete($uri){
	return anchor($uri,'<span class="glyphicon glyphicon-remove" style="color:red;"></span>',array(
		'onclick'=>"return confirm('You are about to delete a record.This can not be undo. Are you sure ?');"
		));
}

function btn_close($uri){
    return anchor($uri,'<span class="glyphicon glyphicon-remove" style="color:red;"></span>',array(
        'onclick'=>"return confirm('You are about to close this advertisment. Are you sure ?');"
        ));
}

function btn_pay($uri){
    return anchor($uri,'<button  style="color:green;">$Pay</button>',array(
        'onclick'=>"return confirm('You are you sure this payment is done?');"
        ));
}

function article_link($article){
    return 'article/'.intval($article->id).'/'.e($article->slug);
}

function article_links($articles){
        $string='<ul >';
        if (count($articles)) {
           foreach ($articles as $article) {
            $url=article_link($article);
            $string .= '<li>';
            if(e($article->userfile)) {
                $string.= '<div class="news_img">'.anchor($url,'<img  src="'.base_url('images/'.e($article->userfile)).'"/>').'</div>';
                $string.='<div class="category_plate" style="margin-top: -60px;"><span>'.e($article->category).'</span></div>';
            }
            $string .= '<h3>' . anchor($url, e($article->title)) .  ' ››</h3>';
            $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;' . e($article->pubdate) . '</p>';
            $string .= '</li>';
            }
        }
        $string.='</ul>';
        return $string;
}

// function recentLink($article){
//     return 'article/'.intval($article->id).'/'.e($article->slug);
// }
function recentLinks($recents){
        $string='<ul >';
        if (count($recents)) {
           foreach ($recents as $recent) {
            $url=article_link($recent);
            $string .= '<li>';
            if(e($recent->userfile)) {
                $string.= '<div class="news_img">'.anchor($url,'<img src="'.base_url('images/'.e($recent->userfile)).'"/>').'</div>';
                $string.='<div class="category_plate" style="margin-top: -60px;"><span>'.e($recent->category).'</span></div>';
            }
            $string .= '<h3>' . anchor($url, e($recent->title)) .  ' ››</h3>';
            $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;' . e($recent->pubdate) . '</p>';
            $string .= '</li>';
            }
        }
        $string.='</ul>';
        return $string;
}



function getPolitics($politics,$numwords=40){
        $string='<ul >';
        if (count($politics)) {
           foreach ($politics as $politic) {
            $url=article_link($politic);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($politic->title)) .  '</h3>';
            if(e($politic->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($politic->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($politic->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($politic->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getCommunity($communities,$numwords=40){
        $string='<ul >';
        if (count($communities)) {
           foreach ($communities as $community) {
            $url=article_link($community);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($community->title)) .  ' </h3>';
            if(e($community->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($community->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($community->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($community->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getBusiness($business,$numwords=40){
        $string='<ul >';
        if (count($business)) {
           foreach ($business as $busines) {
            $url=article_link($busines);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($busines->title)) .  ' </h3>';
            if(e($busines->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($busines->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($busines->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($busines->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getEntertainment($entertainments,$numwords=40){
        $string='<ul >';
        if (count($entertainments)) {
           foreach ($entertainments as $entertainment) {
            $url=article_link($entertainment);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($entertainment->title)) .  ' </h3>';
            if(e($entertainment->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($entertainment->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($entertainment->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($entertainment->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getSport($sports,$numwords=40){
        $string='<ul >';
        if (count($sports)) {
           foreach ($sports as $sport) {
            $url=article_link($sport);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($sport->title)) .  ' </h3>';
            if(e($sport->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($sport->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($sport->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($sport->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}



function getArts($arts,$numwords=40){
        $string='<ul >';
        if (count($arts)) {
           foreach ($arts as $art) {
            $url=article_link($art);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($art->title)) .  '</h3>';
            if(e($art->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($art->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($art->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($art->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getTech($techs,$numwords=40){
        $string='<ul >';
        if (count($techs)) {
           foreach ($techs as $tech) {
            $url=article_link($tech);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($tech->title)) .  '</h3>';
            if(e($tech->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($tech->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($tech->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($tech->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getWorlds($worlds,$numwords=40){
        $string='<ul >';
        if (count($worlds)) {
           foreach ($worlds as $world) {
            $url=article_link($world);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($world->title)) .  ' </h3>';
            if(e($world->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($world->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($world->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($world->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getEconomy($economys,$numwords=40){
        $string='<ul >';
        if (count($economys)) {
           foreach ($economys as $economy) {
            $url=article_link($economy);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($economy->title)) .  ' </h3>';
            if(e($economy->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($economy->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($economy->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($economy->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getHealth($healths,$numwords=40){
        $string='<ul >';
        if (count($healths)) {
           foreach ($healths as $health) {
            $url=article_link($health);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($health->title)) .  '</h3>';
            if(e($health->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($health->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($health->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($health->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function getBlog($blogs,$numwords=40){
        $string='<ul >';
        if (count($blogs)) {
           foreach ($blogs as $blog) {
            $url=article_link($blog);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($blog->title)) .  '</h3>';
            if(e($blog->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($blog->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($blog->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($blog->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}
function getEducation($educations,$numwords=40){
        $string='<ul >';
        if (count($educations)) {
           foreach ($educations as $education) {
            $url=article_link($education);
            $string .= '<li>';
            $string .= '<h3>' . anchor($url, e($education->title)) .  '</h3>';
            if(e($education->userfile)) {
                $string.= '<div class="news_img"><img src="'.base_url('images/'.e($education->userfile)).'"/></div>';
            }
           // $string .= '<p class="pubdate" style="font-size:13px;text-align:right;color:gray;">' . e($politic->pubdate) . '</p>';
            $string.='<p style="text-align:justify;">'.html_entity_decode(limit_to_numwords(strip_tags($education->body),$numwords)).'</p>';
            $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($education->title))).'<p>';
            $string .= '<hr style="background:lightgray;height:1px;"/></li>';
            }
        }
        $string.='</ul>';
        return $string;
}

function get_excerpt($article,$numwords=30){
//this is the function for getting excerpt of the news article
    $string='';
    $url='article/'.intval($article->id).'/'.e($article->slug);
    $string.='<div class="category_homepage"><p>'.strtoupper(e($article->category)).'</p></div>';
    $string.='<h1 style="text-align:center;margin-top:80px;font-size:50px; font-weight:bold;">'.anchor($url,e($article->title)).'</h1>';
    //$string.='<p class="pubdate" style="float:right;">'.e($article->pubdate).'</p>';
    if(e($article->userfile)) {
        $string.= '<div class="feature_news"><img  src="'.base_url('images/'.e($article->userfile)).'"/></div>';
    }
    $string.='<p style="text-align:center;font-size:22px;margin-top:10px;">'.html_entity_decode(limit_to_numwords(strip_tags($article->body),$numwords)).'</p>';
    $string.='<p style="text-align:right;">'.anchor($url,'Read More',array('title'=>e($article->title))).'<p>';
    return $string;
}

function get_comment($comments, $article_id = null){
//this is the function for getting excerpt of the news article
    $string='';
    $CI =& get_instance();

        if (count($comments)) {

            $segment = $CI->uri->segment(1);
           
            if($segment != "admin"){
               foreach ($comments as $comment) {
                    
                    $date = date_create(e($comment->date));
                    $new_format = date_format($date,"Y-M-D");

                    $string .= '<div class="comments"><p style="font-weight:bold;color:#1a75ff;">' . e($comment->c_name).'<span style="color:gray;font-size:13px;">'.$new_format.'</span> </p>';
                    $string .= '<p>' . html_entity_decode($comment->body).  ' </p></div>';
                
                }
            }else{

                foreach ($comments as $comment) {
                    
                    $url = 'admin/article/delet_comment/'.e($comment->id).'/'.$article_id;
                    $date = date_create(e($comment->date));
                    $new_format = date_format($date,"Y-M-D");

                    $string .= '<div class="comments" onmouseover="showButton(this.id)"><p style="font-weight:bold;color:#1a75ff;">' . e($comment->c_name).'&nbsp;/&nbsp;'.e($comment->c_email).'<span style="color:gray;font-size:13px;">'.$new_format.'</span> </p>';
                    $string .= '<p>' . html_entity_decode($comment->body).  ' </p>';
                //    $string .= '<hr style="background:lightgray;height:1px;"><p id="c_delete" class="btn btn-danger" style="margin-top:-18px;padding:2px 7px;">'.anchor($url,'Delete').'</p></div>';
                    $string .= '<p class="btn btn-info" style="margin-top:0px;padding:5px 12px;">'.btn_delete($url).'</p></div>';
                }
            }
        }else{
            $string.='<div class="alert alert-info"><p>No comments yet.</p></div>';
        }
        
        return $string;
}

function get_excerpt_pages($article,$numwords=30){
//this is the function for getting excerpt of the news article
    $string='';
    $url='article/'.intval($article->id).'/'.e($article->slug);
   if(e($article->userfile)) {
        $string.= '<div class="col-sm-4"  >'.anchor($url,'<img  id="page_image" src="'.base_url('images/'.e($article->userfile)).'"/>').'</div>';
        $string.='<div class="col-sm-8"><h1 style="margin-top:20px;font-size:20px; font-weight:bold;color:blue;font-style:bold;">'.anchor($url,e($article->title)).'</h1>';
        //$string.='<p class="pubdate" style="float:right;">'.e($article->pubdate).'</p>';
        $string.='<p style="text-align:justify;font-size:16px;margin-top:10px;">'.html_entity_decode(limit_to_numwords(strip_tags($article->body),$numwords)).'</p>';
        $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($article->title))).'<p></div>';
    }else{
        $string.='<div class="col-sm-12"><h1 style="margin-top:20px;font-size:20px; font-weight:bold;color:blue;font-style:bold;">'.anchor($url,e($article->title)).'</h1>';
        //$string.='<p class="pubdate" style="float:right;">'.e($article->pubdate).'</p>';
        $string.='<p style="text-align:justify;font-size:16px;margin-top:10px;">'.html_entity_decode(limit_to_numwords(strip_tags($article->body),$numwords)).'</p>';
        $string.='<p style="text-align:right;">'.anchor($url,'Read More',array('title'=>e($article->title))).'<p></div>';
    }
    return $string;
}

function get_excerpt_archive($article,$numwords=30){
//this is the function for getting excerpt of the news article
    $string='';
    $url='article/'.intval($article->id).'/'.e($article->slug);

   if(e($article->userfile)) {
        $string.= '<div class="col-sm-4" style="overflow:hidden;" >'.anchor($url,'<img  id="page_image" src="'.base_url('images/'.e($article->userfile)).'"/>');
        $string.='<div class="category_plate"><span>'.e($article->category).'</span></div>';
        $string.='<h1 style="margin-top:20px;font-size:20px; font-weight:bold;color:blue;font-style:bold;">'.anchor($url,e($article->title)).'</h1>';
        
        //$string.='<p class="pubdate" style="float:right;">'.e($article->pubdate).'</p>';
        $string.='<p style="text-align:justify;font-size:16px;margin-top:10px;">'.e(limit_to_numwords(strip_tags($article->body),$numwords)).'</p>';
        $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($article->title))).'<p></div>';
    }else{
        $string.='<div class="col-sm-4"><h1 style="margin-top:20px;font-size:20px; font-weight:bold;color:blue;font-style:bold;">'.anchor($url,e($article->title)).'</h1>';
        //$string.='<p class="pubdate" style="float:right;">'.e($article->pubdate).'</p>';
        $string.='<p style="text-align:justify;font-size:16px;margin-top:10px;">'.e(limit_to_numwords(strip_tags($article->body),$numwords)).'</p>';
        $string.='<p style="text-align:right;">'.anchor($url,'Read More ››',array('title'=>e($article->title))).'<p></div>';
    }
    return $string;
}

function limit_to_numwords($string,$numwords){
    $excerpt=explode(' ', $string,$numwords+1);
    if (count($excerpt)>=$numwords) {
        array_pop($excerpt);
    }
    $excerpt=implode(' ',$excerpt);
    return $excerpt;
}
function e($string){
    return htmlentities($string);
}
//feching menu dynamically 

function get_menu($array,$child=false){
//whether it is child or not
//tutorial 16
    $CI =& get_instance();
    $str='';   
    if (count($array)) {
       
        foreach ($array as $item) {
            $active=$CI->uri->segment(1)==$item['slug']?TRUE:FALSE;
            if (isset($item['children'])&& count($item['children'])) {
                $str.=$active?'<li class="dropdown active">':'<li class="dropdown">';
                $str.='<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="'.site_url(e($item['slug'])).'">'.e($item['title']);
                $str.='<span class="caret"></span></a>';
                $str.='<ul class="dropdown-menu">';
                $str.=get_menu($item['children'],true);
                $str.='</ul>'.PHP_EOL;
                
            }else{
                $str.=$active?'<li class="active">':'<li>';
                $str.='<a href="'.site_url($item['slug']).'">'.e($item['title']).'</a>';
            } 

            $str.='</li>'.PHP_EOL;
           
        }
        $str.='</ul>'.PHP_EOL;  
    }
    return $str;
}

//function that retrives the menus in array
// function menuCount(){
// //whether it is child or not
// //tutorial 16
//     $CI =& get_instance();
//     $str;
//     $count=0;
    
//     if (count($CI->data['menu']=$CI->page_m->get_nested())) {
       
//         foreach ($CI->data['menu']=$CI->page_m->get_nested() as $item) {
//             $active=$CI->uri->segment(1)==$item['slug']?TRUE:FALSE;
//             $str[$count] = $item['slug'];
//             $count++;
//         }

//     }
    
//     return $str;

// }



/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

// function check($permission) {
//     $ci = &get_instancce();

//     $current_user = $ci->session->userdata('id');

//     $ci->db->where('permission', $permission); //add column permission
//     $ci->db->where('id', $current_user);

//     $result = $ci->db->get('permission');

//     if ($result->num_rows() == 1) {
//         return true;
//     } 

//     redirect('admin');
// }