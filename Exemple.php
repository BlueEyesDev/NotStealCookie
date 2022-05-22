<?php
SESSION_START();

class SecuSession {
    public $Email;
    public $Text;
    public $IP;
    public $UserAgent;
    
}

if (isset($_GET['generate'])){
    $Exemple = new SecuSession;
    $Exemple->Email = "exemple@github.com";
    $Exemple->Text = "This is my exemple for detect is cookie stealed";
    $Exemple->IP = $_SERVER["REMOTE_ADDR"];
    $Exemple->UserAgent = $_SERVER["HTTP_USER_AGENT"];
    $_SESSION["user"] = $Exemple;
    echo "Session Generate";
} else if (isset($_GET['verif'])){
    if ($_SESSION["user"]->IP == $_SERVER["REMOTE_ADDR"] && $_SESSION["user"]->UserAgent == $_SERVER["HTTP_USER_AGENT"]){
        echo "Cookie not Stealed";
    }else {
       echo "Cookie Stealed";
    }
}
