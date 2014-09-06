<?php

interface DataObject {

    public static function build($result);

    public function update();

    public function delete();
}
