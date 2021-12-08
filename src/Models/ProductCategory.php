<?php
namespace Sil2\Vidflex\Models;

// use Fureev\Trees\Config\TreeAttribute;
use Fureev\Trees\Contracts\TreeConfigurable;
use Fureev\Trees\NestedSetTrait;
use Fureev\Trees\Config\Base;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model implements TreeConfigurable
{
    use NestedSetTrait;

    protected static function buildTreeConfig(): Base
    {
        $config= new Base(true);

        return $config;
    }

}
