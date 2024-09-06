<?php
class ControllerExtensionModuleFeaturedProducts extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/module/featured_products');
        $this->document->setTitle($this->language->get('heading_title'));
        
        $this->load->model('setting/setting');
        $this->load->model('catalog/product');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('module_featured_products', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true));
        }

        $data['heading_title'] = $this->language->get('heading_title');

        // Text
        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');

        // Entries
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_product'] = $this->language->get('entry_product');
        $data['entry_limit'] = $this->language->get('entry_limit');
        $data['entry_title'] = $this->language->get('entry_title');

        // Buttons
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['action'] = $this->url->link('extension/module/featured_products', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true);

        if (isset($this->request->post['module_featured_products_status'])) {
            $data['module_featured_products_status'] = $this->request->post['module_featured_products_status'];
        } else {
            $data['module_featured_products_status'] = $this->config->get('module_featured_products_status');
        }

        if (isset($this->request->post['module_featured_products_limit'])) {
            $data['module_featured_products_limit'] = $this->request->post['module_featured_products_limit'];
        } else {
            $data['module_featured_products_limit'] = $this->config->get('module_featured_products_limit');
        }

        if (isset($this->request->post['module_featured_products_selected'])) {
            $data['module_featured_products_selected'] = $this->request->post['module_featured_products_selected'];
        } else {
            $data['module_featured_products_selected'] = $this->config->get('module_featured_products_selected');
        }

        if (isset($this->request->post['module_featured_products_title'])) {
            $data['module_featured_products_title'] = $this->request->post['module_featured_products_title'];
        } else {
            $data['module_featured_products_title'] = $this->config->get('module_featured_products_title');
        }

        $data['products'] = $this->model_catalog_product->getProducts();

        $this->load->model('design/layout');
        $data['layouts'] = $this->model_design_layout->getLayouts();

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/featured_products', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/featured_products')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
        return !$this->error;
    }
}
?>
