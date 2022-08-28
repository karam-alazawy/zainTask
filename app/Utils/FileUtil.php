<?php

namespace App\Utils;


class FileUtil  
{

    /**
     * Updates tax amount of a tax group
     *
     * @param int $group_tax_id
     *
     * @return void
     */
    

     // return employee’s and their files grouped.
    public function getEmployeeFiles($list) 
    {
        $output = array();
        foreach ($list as $values) {
            foreach ($values as $key => $value) {
                 $output[$value][] = $key;
            }
        }
        return $output;
        
    }
}
