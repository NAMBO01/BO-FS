<?php
include_once './libraries/xl_loai_san_pham.php';
class c_loai_san_pham
{
    private $xl_loai_san_pham;
    function __construct()
    {
        $this->xl_loai_san_pham = new xl_loai_san_pham();
    }
    // This function is used to generate an HTML list of categories from the sb_loai_san_pham table.
    function ds_loai_san_pham()
    {
        // Retrieve a list of top-level categories by calling the danh_sach_loai_san_pham() method of the xl_loai_san_pham property,
        // which is expected to be an object.
        $ds_loai_sp = $this->xl_loai_san_pham->danh_sach_loai_san_pham();
        // Iterate over the list of categories.
        for ($i = 0; $i < count($ds_loai_sp); $i++) {
            // Generate an HTML li element for the current category.
            echo ' <li';
            // If the current category has child categories, add a class attribute of "item1" to the li element.
            if (isset($ds_loai_sp[$i]->ds_con)) {
                if (count($ds_loai_sp[$i]->ds_con) > 0) {
                    echo ' class="item1"';
                }
            }
            echo ' > ';
            // Generate an HTML a element with a link to the category page and the name of the category.
            echo '<a href="#">' . $ds_loai_sp[$i]->ten_loai_sp . '<img class="arrow-img" src="images/arrow1.png" alt="" /></a>';
            // If the current category has child categories, generate an HTML ul element with a class attribute of "cute"
            // and li elements for each child category, containing a elements with links to the child category pages and the names of the child categories.
            // Generate an HTML list of categories, with subcategories nested inside the parent categories.
            if (isset($ds_loai_sp[$i]->ds_con)) { // If the current category has child categories...
                if (count($ds_loai_sp[$i]->ds_con) > 0) { // ...and there are more than 0 child categories...
                    echo '<ul class="cute">'; // ...generate an HTML ul element with a class attribute of "cute".
                    for ($j = 0; $j < count($ds_loai_sp[$i]->ds_con); $j++) { // Iterate over the child categories.
                        // Generate an HTML li element with a class attribute of "subitem1" for the current child category,
                        // and an HTML a element with a link to the child category page and the name of the child category.
                        echo ' <li class="subitem1"><a href="product_type.php?id_loai_sp=' . $ds_loai_sp[$i]->ds_con[$j]->ID_loai_sp . '">' . $ds_loai_sp[$i]->ds_con[$j]->ten_loai_sp . '</a></li>';
                    }
                    echo '</ul>'; // Close the HTML ul element.
                }
            }
        }
    }
}
