<?php
class ControllerExtensionModuleFeaturedProducts extends Controller {
    public function index() {
        $this->load->language('extension/module/featured_products');
        $this->load->model('catalog/product');
        $this->load->model('tool/image');

        $cache_key = 'featured_products.' . $this->config->get('config_language_id');
        $cached_data = $this->cache->get($cache_key);

        if (!$cached_data) {
            $data['products'] = array();
            $product_ids = $this->config->get('module_featured_products_selected');
            
            if (!$product_ids || !$this->config->get('module_featured_products_status')) {
                return;
            }

            foreach ($product_ids as $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);

                if ($product_info) {
                    $data['products'][] = array(
                        'name'  => $product_info['name'],
                        'thumb' => $this->model_tool_image->resize($product_info['image'], 200, 200),
                        'price' => $product_info['price'],
                        'href'  => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
                    );
                }
            }

            $this->cache->set($cache_key, $data);
        } else {
            $data = $cached_data;
        }

        return $this->load->view('extension/module/featured_products', $data);
    }
}
?>
