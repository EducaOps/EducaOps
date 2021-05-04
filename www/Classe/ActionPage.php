<?php

namespace ActionPage;

class Action
{
    public function RedirectToURL($url){
        echo "<meta http-equiv=\"Refresh\" content=\"0; url=$url\">";
        exit;
    }
}

