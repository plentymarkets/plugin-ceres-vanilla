<?php

namespace CeresVanilla\Providers;

use Ceres\Caching\NavigationCacheSettings;
use Ceres\Caching\SideNavigationCacheSettings;
use IO\Services\ContentCaching\Services\Container;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Extensions\Functions\Partial;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;
use Plenty\Plugin\ConfigRepository;


/**
 * Class CeresVanillaServiceProvider
 * @package CeresVanilla\Providers
 */
class CeresVanillaServiceProvider extends ServiceProvider
{
    const PRIORITY = 0;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher, ConfigRepository $config)
    {

        $enabledOverrides = explode(", ", $config->get("CeresVanilla.templates.override"));

        // Override partials
        $dispatcher->listen('IO.init.templates', function (Partial $partial) use ($enabledOverrides)
        {
            pluginApp(Container::class)->register('CeresVanilla::PageDesign.Partials.Header.NavigationList.twig', NavigationCacheSettings::class);
            pluginApp(Container::class)->register('CeresVanilla::PageDesign.Partials.Header.SideNavigation.twig', SideNavigationCacheSettings::class);

            $partial->set('head', 'Ceres::PageDesign.Partials.Head');
            $partial->set('header', 'Ceres::PageDesign.Partials.Header.Header');
            $partial->set('page-design', 'Ceres::PageDesign.PageDesign');
            $partial->set('footer', 'Ceres::PageDesign.Partials.Footer');

            if (in_array("head", $enabledOverrides) || in_array("all", $enabledOverrides))
            {
                $partial->set('head', 'CeresVanilla::PageDesign.Partials.Head');
            }

            if (in_array("header", $enabledOverrides) || in_array("all", $enabledOverrides))
            {
                $partial->set('header', 'CeresVanilla::PageDesign.Partials.Header.Header');
            }

            if (in_array("page_design", $enabledOverrides) || in_array("all", $enabledOverrides))
            {
                $partial->set('page-design', 'CeresVanilla::PageDesign.PageDesign');
            }

            if (in_array("footer", $enabledOverrides) || in_array("all", $enabledOverrides))
            {
                $partial->set('footer', 'CeresVanilla::PageDesign.Partials.Footer');
            }

            return false;
        }, self::PRIORITY);

        // Override homepage
        if (in_array("homepage", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.home', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Homepage.Homepage');
                return false;
            }, self::PRIORITY);
        }

        // Override template for content categories
        if (in_array("category_content", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.category.content', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Category.Content.CategoryContent');
                return false;
            }, self::PRIORITY);
        }

        // Override template for item categories
        if (in_array("category_item", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.category.item', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Category.Item.CategoryItem');
                return false;
            }, self::PRIORITY);
        }

        // Override shopping cart
        if (in_array("basket", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.basket', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Basket.Basket');
                return false;
            }, self::PRIORITY);
        }

        // Override checkout
        if (in_array("checkout", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.checkout', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Checkout.Checkout');
                return false;
            }, self::PRIORITY);
        }

        // Override order confirmation page
        if (in_array("order_confirmation", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.confirmation', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Checkout.OrderConfirmation');
                return false;
            }, self::PRIORITY);
        }

        // Override login page
        if (in_array("login", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.login', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Customer.Login');
                return false;
            }, self::PRIORITY);
        }

        // Override register page
        if (in_array("register", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.register', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Customer.Register');
                return false;
            }, self::PRIORITY);
        }

        // Override single item page
        if (in_array("item", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.item', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Item.SingleItemView');
                return false;
            }, self::PRIORITY);
        }

        // Override category view
        if (in_array("category_view", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.search', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::ItemList.ItemListView');
                return false;
            }, self::PRIORITY);
        }

        // Override my account
        if (in_array("my_account", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.my-account', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::MyAccount.MyAccount');
                return false;
            }, self::PRIORITY);
        }

        // Override wish list
        if (in_array("wish_list", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.wish-list', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::WishList.WishListView');
                return false;
            }, self::PRIORITY);
        }

        // Override contact page
        if (in_array("contact", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.contact', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::Customer.Contact');
                return false;
            }, self::PRIORITY);
        }

        // Override cancellation rights
        if (in_array("cancellation_rights", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.cancellation-rights', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::StaticPages.CancellationRights');
                return false;
            }, self::PRIORITY);
        }

        // Override cancellation form
        if (in_array("cancellation_form", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.cancellation-form', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::StaticPages.CancellationForm');
                return false;
            }, self::PRIORITY);
        }

        // Override legal disclosure
        if (in_array("legal_disclosure", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.legal-disclosure', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::StaticPages.LegalDisclosure');
                return false;
            }, self::PRIORITY);
        }

        // Override privacy policy
        if (in_array("privacy_policy", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.privacy-policy', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::StaticPages.PrivacyPolicy');
                return false;
            }, self::PRIORITY);
        }

        // Override terms and conditions
        if (in_array("terms_conditions", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.terms-conditions', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::StaticPages.TermsAndConditions');
                return false;
            }, self::PRIORITY);
        }

        // Override item not found page
        if (in_array("item_not_found", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.item-not-found', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::StaticPages.ItemNotFound');
                return false;
            }, self::PRIORITY);
        }

        // Override page not found page
        if (in_array("page_not_found", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

            $dispatcher->listen('IO.tpl.page-not-found', function (TemplateContainer $container)
            {
                $container->setTemplate('CeresVanilla::StaticPages.PageNotFound');
                return false;
            }, self::PRIORITY);
        }

        // Override auto complete list item result fields
        if (in_array("auto_complete_list_item", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

          $dispatcher->listen( 'IO.ResultFields.AutoCompleteListItem', function(ResultFieldTemplate $templateContainer)
          {
              $templateContainer->setTemplate(ResultFieldTemplate::TEMPLATE_AUTOCOMPLETE_ITEM_LIST, 'Ceres::ResultFields.AutoCompleteListItem');
          });
        }

        // Override basket item result fields
        if (in_array("basket_item", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

          $dispatcher->listen( 'IO.ResultFields.BasketItem', function(ResultFieldTemplate $templateContainer)
          {
              $templateContainer->setTemplate(ResultFieldTemplate::TEMPLATE_BASKET_ITEM, 'Ceres::ResultFields.BasketItem');
          });
        }

        // Override category tree result fields
        if (in_array("category_tree", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

          $dispatcher->listen( 'IO.ResultFields.CategoryTree', function(ResultFieldTemplate $templateContainer)
          {
              $templateContainer->setTemplate(ResultFieldTemplate::TEMPLATE_CATEGORY_TREE, 'Ceres::ResultFields.CategoryTree');
          });
        }

        // Override list item result fields
        if (in_array("list_item", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

          $dispatcher->listen( 'IO.ResultFields.ListItem', function(ResultFieldTemplate $templateContainer)
          {
              $templateContainer->setTemplate(ResultFieldTemplate::TEMPLATE_LIST_ITEM, 'Ceres::ResultFields.ListItem');
          });
        }

        // Override single item view result fields
        if (in_array("single_item", $enabledOverrides) || in_array("all", $enabledOverrides))
        {

          $dispatcher->listen( 'IO.ResultFields.SingleItem', function(ResultFieldTemplate $templateContainer)
          {
              $templateContainer->setTemplate(ResultFieldTemplate::TEMPLATE_SINGLE_ITEM, 'Ceres::ResultFields.SingleItem');
          });
        }
    }
}
