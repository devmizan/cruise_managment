<?php
class Page{


public static function header_open(){
   $html="<div class='page-header'>";
   return $html;
}

public static function header_close(){
  $html="</div>";
  return $html;
}


public static function title($config){
    
    $title=isset($config["title"])?$config["title"]:"Page Title";
    
     $html=<<<HTML
        <div class="row m-1">
              <div class="col-12 ">
                <h4 class="main-title">$title</h4>
                <ul class="app-line-breadcrumbs mb-3">
                  <li class="">
                    <a href="#" class="f-s-14 f-w-500"> 
                      <span>
                        <i class="ph-duotone  ph-briefcase f-s-16"></i> Home
                      </span>
                    </a>
                  </li>
                  <li class="active">
                    <a href="#" class="f-s-14 f-w-500">$title</a>
                  </li>
                </ul>
              </div>
            </div>
      </div>
    HTML;
    return $html;
    }
    
    
      
    public static function body_open($config=["col"=>12]){
        $col=$config["col"];
        $html=<<<HTML
        <div class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-lg-$col">
    HTML;
    return $html;
    }
    
    public static function body_close(){
        $html=<<<HTML
         </div>
        </div>    
      </div> 
    </div>
    HTML;
    return $html;
    }
    
    public static function context_open($config=[]){
       global $base_url;
        $config["title"]=isset($config["title"])?$config["title"]:"&nbsp;"; 
        // print_r($config);
        $config["route"]=isset($config["route"])?$config["route"]:"#"; 
         
         $html="<div class='card' style='padding:10px;margin-top:10px;'>";
        
         $html.="<div class='card-header d-flex justify-content-between'>";
         $html.=" <div class='flex-fill'>{$config["title"]}</div> "; 
         if(isset($config["create"])){
          $html.=" <a class='btn btn-success' href='$base_url/{$config["route"]}'>{$config["create"]}</a>";
         }
         if(isset($config["manage"])){
          $html.=" <a class='btn btn-success' href='$base_url/{$config["route"]}'>{$config["manage"]}</a>";
         }
         $html.="</div>";
         $html.="<div class='card-body'>";
         return $html; 
      }
      
      public static function context_close(){
         $html="</div>";
         $html.="</div>";
         return $html;
       }
}

?>