<?php
    $fp = @fopen("channels/masterdb.txt", 'r'); 
    if ($fp) {
        $results = explode("^", fread($fp, filesize("channels/masterdb.txt")));
    }
    require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/variables.php");
    
    require($_SERVER['DOCUMENT_ROOT']."/ds/v2-us/sudomemo-utils/class.ugomenu.php");
    $mainMenu = new ugomenu;
    $mainMenu->setType("2");
    $mainMenu->setMeta("uppertitle", "Browse Flipnotes");
    $mainMenu->setMeta("uppersubtop", "Post Flipnotes from Channels");

    $mainMenu->addDropdown([
      "label" => "Latest",
      "url"   => $cdnurl."ds/v2-us/en/browse.uls",
      "selected" => "1"
    ]);
    
    if(isset($_GET['page'])){
        $page=(int)$_GET['page'];
        }else{
            $page=1;
        }
    
        $ln = ($page-1)*6;
        $hn = 12;
        #echo "Page: ".$page."<br>LN: ".$ln."<br>HN: ".$hn;
        
        #print_r($results);
        
        #echo "<br><br>-------<br><br>";
        
        $results = array_slice($results, $ln, $hn);
        
        #print_r($results);
    
        if(isset($_GET['page'])){
            if($_GET['page']!="1"){
                $mainMenu->addItem([
                    "url"   => $cdnurl.'ds/v2-us/en/browse.uls?page='.((int)$_GET["page"]-1),
                    "icon"  => "4",
                    "fuckoff" => "1"
                ]);
            }
        }
    
        foreach ($results as $result) {
            if(substr($result,-3)=="ppm"){
                #$name = exec('py '.$cdnpath.'ds\v2-us\en\channels\4\fsidfetch.py '.$result);
                #$name = file_get_contents('../../auth/'.$name.'.txt');
                #$name = str_replace('"', "™", $name);
                #$name = str_replace('*&#', "", $name);
                $chnl = explode(":", $result)[0];
                $resultf = explode(":", $result)[1];
                $mainMenu->addItem([
                    "url"   => $cdnurl."ds/v2-us/en/channels/".$chnl."/".$resultf,
                    "icon"  => "3",
                    "counter"=>"0",
                    "file"  => "channels/".$chnl."/".$resultf,
                    "fuckoff" => "1"
                ]);
            }
        }
        if(isset($_GET['page'])){
                $mainMenu->addItem([
                    "url"   => $cdnurl.'ds/v2-us/en/browse.uls?page='.((int)$_GET["page"]+1),
                    "icon"  => "5",
                    "fuckoff" => "1"
                ]);
        }else{
                $mainMenu->addItem([
                    "url"   => $cdnurl.'ds/v2-us/en/browse.uls?page=2',
                    "icon"  => "5",
                    "fuckoff" => "1"
                ]);
        }
    
    echo $mainMenu->getUGO();

?>