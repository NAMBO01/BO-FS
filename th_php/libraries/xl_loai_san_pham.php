<?php
include_once 'database.php';
class xl_loai_san_pham extends database
{
    // This function is used to retrieve a list of top-level categories (i.e., categories with no parent categories)
    // from the sb_loai_san_pham table.
    function danh_sach_loai_san_pham()
    {
        // Define a SELECT statement that retrieves all rows from the sb_loai_san_pham table where the id_loai_cha column is equal to 0.
        $lenh_sql = "SELECT * FROM sb_loai_san_pham WHERE id_loai_cha = 0";
        // Set the query to be executed.
        $this->setQuery($lenh_sql);
        // Execute the query and retrieve all rows of data.
        $result = $this->loadAllRow();

        // Iterate over the rows of data and call the danh_sach_loai_sp_con() function for each row,
        // passing the ID_loai_sp column as an argument.
        foreach ($result as $item) {
            $ds_con = $this->danh_sach_loai_sp_con($item->ID_loai_sp);
            // If the danh_sach_loai_sp_con() function returns a non-empty list of child categories,
            // add the list of child categories to the ds_con property of the current row.
            if ($ds_con) {
                $item->ds_con = $ds_con;
            }
        }
        // Return the list of top-level categories.
        return $result;
    }

    // This function is used to retrieve a list of child categories (i.e., categories with a parent category)
    // from the sb_loai_san_pham table.
    function danh_sach_loai_sp_con($id_loai_sp_cha)
    {
        // Define a SELECT statement that retrieves all rows from the sb_loai_san_pham table where the id_loai_cha column
        // is equal to the $id_loai_sp_cha argument passed to the function.
        $lenh_sql = "SELECT * FROM sb_loai_san_pham WHERE id_loai_cha = $id_loai_sp_cha";
        // Set the query to be executed.
        $this->setQuery($lenh_sql);
        // Execute the query and return all rows of data.
        $result = $this->loadAllRow();
        return $result;
    }

    // This function is used to retrieve a list of all categories from the sb_loai_san_pham table.
    function loai_san_pham()
    {
        // Define a SELECT statement that retrieves all rows from the sb_loai_san_pham table.
        $lenh_sql = "SELECT * FROM sb_loai_san_pham ";
        // Set the query to be executed.
        $this->setQuery($lenh_sql);
        // Execute the query and return all rows of data.
        $result = $this->loadAllRow();
        return $result;
    }
}
