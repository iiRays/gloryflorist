<?php

interface MementoSaver {
    public function __construct();
    
    public function backup($obj);
    
    public function save();
    
    public function restore();
}
