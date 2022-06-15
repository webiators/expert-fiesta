<?php
/**
 * @category   Webiators
 * @package    Webiators_BuyNowButton
 * @author     Webiators Team
 * @copyright  Copyright (c) Webiators Technologies Private Limited. ( https://store.webiators.com ).
 */
namespace Webiators\BuyNowButton\Helper;

/**
 * @package Webiators\BuyNowButton\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @var \Magento\Framework\Filter\FilterManager
     */
    private $filterManager;

    /**
     * Data constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Filter\FilterManager $filterManager
    ){
        parent::__construct($context);
        $this->filterManager = $filterManager;
        $this->_scopeConfig = $context->getScopeConfig();
    }

    /**
     * Check if Webiators BuyNowButton module is enabled.
     *
     * @param null $storeId
     * @return mixed
     */
    public function isBuyNowButtonEnabled($storeId = null)
    {
        return $this->_scopeConfig->getValue('buy_now_button/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }


    /**
     * Check if Webiators BuyNowButton module is enabled on Product Page.
     *
     * @param null $storeId
     * @return mixed
     */
    public function isBuyNowButtonForProductEnabled($storeId = null)
    {
        return $this->_scopeConfig->getValue('buy_now_button/general/enable_on_product_page', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }



    /**
     * Check if Webiators BuyNowButton module is enabled on List/Category Page.
     *
     * @param null $storeId
     * @return mixed
     */
    public function isBuyNowButtonForListEnabled($storeId = null)
    {
        return $this->_scopeConfig->getValue('buy_now_button/general/enable_on_list_page', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
    }


     /**
     * Return product Page Button Label
     *
     * @param null $storeId
     * @return mixed
     */

    public function getButtonLabel($storeId = null)
    {
        $formattedProductPageButtonLabel = $this->_scopeConfig->getValue('buy_now_button/general/product_button_label', \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $storeId);
        return $this->filterManager->stripTags($formattedProductPageButtonLabel,['allowableTags' => null,'escape' => true]);
    }

    

     /**
     * Return BuyNowbtn Text Background color Option
     *
     * @return string
     */
    public function getBuyNowButtonBgColorOption(){
        return $this->scopeConfig->getValue('buy_now_button/general/buynowbtn_bg_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

     /**
     * Return BuyNowbtn Text Color Option
     *
     * @return string
     */
    public function getBuyNowButtonTextColorOption(){
        return $this->scopeConfig->getValue('buy_now_button/general/buynowbtn_text_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

     /**
     * Return BuyNowbtn Border Color Option
     *
     * @return string
     */
    public function getBuyNowButtonBorderColorOption(){
        return $this->scopeConfig->getValue('buy_now_button/general/buynowbtn_border_color_option', 
                        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }


}
