<?php
include_once 'database.php';
class xl_don_hang extends database
{
    // This function is used to retrieve the total number of orders in the sb_don_hang table.
    function tong_so_luong_don_hang()
    {
        // Define a SELECT statement that uses the COUNT(*) function to count the number of rows in the sb_don_hang table
        // and alias the result as tong_so_luong.
        $lenh_sql = "SELECT COUNT(*) as tong_so_luong
        FROM sb_don_hang";
        // Set the query to be executed.
        $this->setQuery($lenh_sql);
        // Execute the query and return all rows of data.
        $result = $this->loadAllRow();
        return $result;
    }

    // This function is used to retrieve the total revenue from the sb_don_hang table.
    function doanh_thu()
    {
        // Define a SELECT statement that uses the SUM() function to sum the tong_tien column of the sb_don_hang table
        // and alias the result as tong_doanh_thu. The SELECT statement also includes a JOIN clause that joins the sb_don_hang table
        // with the sb_user table on the ID column, and a WHERE clause that filters the results to only include rows where the
        // id_loai_user column of the sb_user table is less than 5.
        $lenh_sql = "SELECT SUM(dh.tong_tien) as tong_doanh_thu
        FROM sb_don_hang dh JOIN sb_user s ON s.ID = dh.id_nguoi_dung
        WHERE s.id_loai_user < 5;";
        // Set the query to be executed.
        $this->setQuery($lenh_sql);
        // Execute the query and return all rows of data.
        $result = $this->loadAllRow();
        return $result;
    }
}
