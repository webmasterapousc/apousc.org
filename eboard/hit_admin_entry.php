<?php
echo "<strong>".$url."</strong><ul>";
for($y=12;$y<15;$y++){
    for($m=00;$m<13;$m++){
        if($m=="0"){$m="00";}else if($m=="1"){$m="01";}else if($m=="2"){$m="02";}if($m=="3"){$m="03";}else if($m=="4"){$m="04";}else if($m=="5"){$m="05";}else if($m=="6"){$m="06";}else if($m=="7"){$m="07";}else if($m=="8"){$m="08";}else if($m=="9"){$m="09";};
        for($d=00;$d<32;$d++){
            if($d=="0"){$d="00";}else if($d=="1"){$d="01";}else if($d=="2"){$d="02";}else if($d=="3"){$d="03";}else if($d=="4"){$d="04";}else if($d=="5"){$d="05";}else if($d=="6"){$d="06";}else if($d=="7"){$d="07";}else if($d=="8"){$d="08";}else if($d=="9"){$d="09";};
            if(file_exists("hits/".$url.date($y.$m.$d).".txt")){
                $file_array = file("hits/".$url.date($y.$m.$d).".txt");
                fputs(fopen("hits/".$url.date($y.$m.$d).".txt","w"),$file_array[0]);
                echo "<li>".$y.$m.$d.": <strong>".$file_array[0]."</strong></li>";
            };
        }
    }
}
echo "</ul>";
?>