# Featured Products Module for OpenCart

This module allows you to feature selected products on your store's homepage in a customizable section. It’s responsive, easily configurable, and can be installed through the OpenCart Extension Installer or manually.

## Features
- Display selected products in a grid or carousel format.
- Set a custom title, product limit, and position on the homepage.
- Responsive design for optimal viewing on all devices.
- Optional caching to enhance performance.

## Installation

### Option 1: Install via OpenCart Extension Installer

1. **Download the Module**: Ensure you have the `.zip` file of the extension ready.
2. **Access Extension Installer**: In the OpenCart admin panel, go to **Extensions** -> **Installer**.
3. **Upload the Module**: Click the "Upload" button and select the `.zip` file of the Featured Products module. OpenCart will handle the file extraction.
4. **Install the Module**: After uploading, go to **Extensions** -> **Modules**. Find "Featured Products" and click the "Install" button.

### Option 2: Manual Installation

1. **Unzip the Files**: Unzip the module archive on your local machine.
2. **Copy Files to OpenCart**: Manually copy the files into your OpenCart installation directory (`admin/`, `catalog/`, and `system/` folders).
3. **Install the Module**: In the admin panel, navigate to **Extensions** -> **Modules**. Find "Featured Products" and click "Install".

## Configuration

1. **Access Module Settings**: After installation, go to **Extensions** -> **Modules** -> "Featured Products" and click "Edit".
2. **Configure the Module**:
   - **Select Products**: Use the multi-select dropdown to choose the products you want to feature.
   - **Set Product Limit**: Define how many products should be displayed.
   - **Custom Title**: Optionally add a custom title for the featured products section.
   - **Enable the Module**: Set the status to "Enabled".
3. **Save Settings**: Click "Save" to apply the changes.

## Adding the Module to the Homepage Layout

To display the module on the homepage:

1. **Go to Layouts**: In the admin panel, navigate to **Design** -> **Layouts**.
2. **Edit the Home Layout**: Click "Edit" next to the **Home** layout.
3. **Add the Featured Products Module**: From the "Choose a Module" dropdown, select "Featured Products". Choose its position (e.g., "Content Top" or "Content Bottom").
4. **Save the Layout**: Click "Save" to apply the changes. The module will now appear on the homepage.

## Usage

- The selected featured products will appear on the homepage in the configured position and display format.
- The module will adjust its layout responsively depending on the screen size.

## Caching (Optional)

To enhance performance, product data is cached after the initial page load. This reduces database queries for subsequent page views. The cache will automatically refresh when the featured products are updated in the admin panel.

---

This module was developed to enhance the flexibility of product presentation on your OpenCart store. If you have any issues, please refer to OpenCart's documentation or seek support from the community.

