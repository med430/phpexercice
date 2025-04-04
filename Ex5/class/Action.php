<?php
class Action {
    public string $actionName;
    public string $imgUrl;
    public string $href;
    public string $authority;
    public function __construct(string $actionName, string $imgUrl, string $href, string $authority) {
        $this->actionName = $actionName;
        $this->imgUrl = $imgUrl;
        $this->href = $href;
        $this->authority = $authority;
    }

    public function isAccessibleAuthority(string $authority = "utilisateur") {
        $userAuthorityVal = $authority == "Admin" ? 1 : 0;
        $authorityVal = $this->authority == "Admin" ? 1 : 0;
        return $userAuthorityVal>=$authorityVal;
    }

    public function url($vars) {
        $url = $this->href . "?";
        foreach($vars as $varName=>$varValue) {
            $url = $url . $varName . "=" . $varValue . "&";
        }
        return $url;
    }
}