<?php

namespace Ben\LogementBundle\Twig;


class paginationExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('pagination', array($this, 'get_paging_info')),
        );
    }

    public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = '$'.$price;

        return $price;
    }

    function get_paging_info ($tot_rows,$pp,$curr_page)
    {
        $pages = ceil($tot_rows / $pp); // calc pages

        $data = array(); // start out array
        $data['si']        = ($curr_page * $pp) - $pp; // what row to start at
        $data['pages']     = $pages;                   // add the pages
        $data['curr_page'] = $curr_page;               // Whats the current page

        return $data; //return the paging data
    }

    public function getName()
    {
        return 'pagination_extension';
    }

}

