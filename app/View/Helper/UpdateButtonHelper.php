<?php

App::uses("AppHelper","View/Helper");

class UpdateButtonHelper extends AppHelper {
    public function renderButton($label, $url, $options = array()) {
        return $this->_View->Html->link($label, $url, $options);
    }
}