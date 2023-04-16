<?php

interface Product{
    public function manageData($switcher);
    public function execute($query);
    public function delete($id,$table);
}