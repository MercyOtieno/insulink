<?php

namespace Botble\Quotation\Providers;

use Botble\Quotation\Models\Quotation;
use Illuminate\Support\ServiceProvider;
use Botble\Quotation\Repositories\Caches\QuotationCacheDecorator;
use Botble\Quotation\Repositories\Eloquent\QuotationRepository;
use Botble\Quotation\Repositories\Interfaces\QuotationInterface;
use Botble\Base\Supports\Helper;
use Botble\Quotation\Http\Middleware\RedirectIfCustomer;
use Botble\Quotation\Http\Middleware\RedirectIfNotCustomer;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class QuotationServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        config([
            'auth.guards.customer'     => [
                'driver'   => 'session',
                'provider' => 'customers',
            ],
            'auth.providers.customers' => [
                'driver' => 'eloquent',
                'model'  => Customer::class,
            ],
            // 'auth.passwords.customers' => [
            //     'provider' => 'customers',
            //     'table'    => 'customer_password_resets',
            //     'expire'   => 60,
            // ],
        ]);

        $router = $this->app['router'];

        $router->aliasMiddleware('customer', RedirectIfNotCustomer::class);
        $router->aliasMiddleware('customer.guest', RedirectIfCustomer::class);

        $this->app->bind(QuotationInterface::class, function () {
            return new QuotationCacheDecorator(new QuotationRepository(new Quotation));
        });
        $this->app->bind(\Botble\Quotation\Repositories\Interfaces\ModelsInterface::class, function () {
            return new \Botble\Quotation\Repositories\Caches\ModelsCacheDecorator(
                new \Botble\Quotation\Repositories\Eloquent\ModelsRepository(new \Botble\Quotation\Models\Models)
            );
        });
        $this->app->bind(\Botble\Quotation\Repositories\Interfaces\MakesInterface::class, function () {
            return new \Botble\Quotation\Repositories\Caches\MakesCacheDecorator(
                new \Botble\Quotation\Repositories\Eloquent\MakesRepository(new \Botble\Quotation\Models\Makes)
            );
        });
        $this->app->bind(\Botble\Quotation\Repositories\Interfaces\CustomerInterface::class, function () {
            return new \Botble\Quotation\Repositories\Caches\CustomerCacheDecorator(
                new \Botble\Quotation\Repositories\Eloquent\CustomerRepository(new \Botble\Quotation\Models\Customer)
            );
        });
        $this->app->bind(\Botble\Quotation\Repositories\Interfaces\UnderwriterInterface::class, function () {
            return new \Botble\Quotation\Repositories\Caches\UnderwriterCacheDecorator(
                new \Botble\Quotation\Repositories\Eloquent\UnderwriterRepository(new \Botble\Quotation\Models\Underwriter)
            );
        });
        $this->app->bind(\Botble\Quotation\Repositories\Interfaces\ProductInterface::class, function () {
            return new \Botble\Quotation\Repositories\Caches\ProductCacheDecorator(
                new \Botble\Quotation\Repositories\Eloquent\ProductRepository(new \Botble\Quotation\Models\Product)
            );
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/quotation')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes([
                'web'
                ]);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Quotation::class]);
                \Language::registerModule([\Botble\Quotation\Models\Models::class]);
                \Language::registerModule([\Botble\Quotation\Models\Makes::class]);
                \Language::registerModule([\Botble\Quotation\Models\Customer::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-quotation',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/quotation::quotation.name',
                'icon'        => 'fa fa-list',
                'url'         => route('quotation.index'),
                'permissions' => ['quotation.index'],
            ]);
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-models',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-quotation',
                'name'        => 'plugins/quotation::models.vname',
                'icon'        => null,
                'url'         => route('models.index'),
                'permissions' => ['models.index'],
            ]);
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-models',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-quotation',
                'name'        => 'plugins/quotation::quotation.name',
                'icon'        => null,
                'url'         => route('quotation.index'),
                'permissions' => ['quotation.index'],
            ]);
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-customer',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-quotation',
                'name'        => 'plugins/quotation::customer.name',
                'icon'        => null,
                'url'         => route('customer.index'),
                'permissions' => ['customer.index'],
            ]);
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-underwriter',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-quotation',
                'name'        => 'plugins/quotation::underwriter.name',
                'icon'        => null,
                'url'         => route('underwriters.index'),
                'permissions' => ['underwriter.index'],
            ]);
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-product',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-quotation',
                'name'        => 'plugins/quotation::product.name',
                'icon'        => null,
                'url'         => route('products.index'),
                'permissions' => ['products.index'],
            ]);
        });
        $this->app->register(HookServiceProvider::class);
    }
}
