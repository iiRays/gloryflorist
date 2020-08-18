<?php

require_once("IFactory.php");

/**
 *
 * @author Johann Lee Jia Xuan
 */
interface XMLFactoryInterface extends IFactory {
    public function build($rootName);
}
