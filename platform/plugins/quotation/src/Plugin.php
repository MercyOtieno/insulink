<?php

namespace Botble\Quotation;

use Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('quotations');
        Schema::dropIfExists('makes');
        Schema::dropIfExists('models');
        Schema::dropIfExists('customers');
    }
}
