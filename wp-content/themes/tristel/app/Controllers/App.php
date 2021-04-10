<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if(is_single()) {
            return ['large' => get_the_title()];
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), '<span>'.get_search_query().'</span>');
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function PageHeaders() {
        $data = [];

        $data['small'] = get_field('small_page_header');
        $data['large'] = get_field('large_page_header');
        $data['width'] = get_field('page_header_width');

        return $data;
    }

    public function WcGlobal() {
        global $woocommerce;

        return $woocommerce;
    }

    public function AllSites() {
        $all_sites = get_sites();
        $current_id = get_current_blog_id();
        $data = [];
        $data['intro'] = [];
        $data['current'] = [];
        $data['all'] = [];
        $count = 0;

       // $site_domain = get_site_url(1);
        foreach($all_sites as $site) {
            switch_to_blog($site->blog_id);
            $site_url = get_site_url($site->blog_id);
            $url = network_site_url();
            $country_index = get_field('country', 'option');
            
            if($site->blog_id == $current_id) {
                $data['current']['flag_img'] = get_field('country_flag', 'option');
                $data['current']['country'] = $country_index['value'];
                $data['current']['lang'] = get_field('language', 'option');
            }

            if(!array_key_exists ( $country_index['value'], $data['all'] ) ) {
                $data['all'][$country_index['value']]['flag_img'] = get_field('country_flag', 'option');
                $data['all'][$country_index['value']]['sites'] = [];
                $data['all'][$country_index['value']]['sites']['language'] = [];
                $data['all'][$country_index['value']]['sites']['url'] = [];
                $data['all'][$country_index['value']]['sites']['path'] = [];
                $data['all'][$country_index['value']]['sites']['blog_id'] = [];
            }

            if(!array_key_exists ( $country_index['value'], $data['intro'] ) ) {
                $data['intro'][$country_index['value']] = get_field('language_modal', 'option');
            }

            array_push ( $data['all'][$country_index['value']]['sites']['url'], $site_url );
            array_push ( $data['all'][$country_index['value']]['sites']['path'], $site->path );
            array_push ( $data['all'][$country_index['value']]['sites']['blog_id'], $site->blog_id );
            array_push ( $data['all'][$country_index['value']]['sites']['language'], get_field('language', 'option') );

            restore_current_blog();

            ++$count;
        }

        return $data;
    }

    public function AllCountries() {

        $all_sites = get_sites();
        $data = [];

        foreach($all_sites as $site) {
            switch_to_blog($site->blog_id);
            if($site->blog_id != 1) {
                array_push ( $data, get_field('country', 'option')['value'] );
            }
            restore_current_blog();
        }

        return array_unique($data);
    }

    public function GeoSite() {
        $all_sites = get_sites();
        $main_site_id = get_main_site_id();
        $site_domain = get_site_url($main_site_id);
        $data = [];
        $data['sites'] = [];
        $data['fallback_url'] = get_site_url($main_site_id);
        $data['main_site_id'] = $main_site_id;

        foreach($all_sites as $site) {
            switch_to_blog($site->blog_id);
            $country_index = get_field('country', 'option');

            if($country_index['value'] == VISITOR_COUNTRY) {
                if(!isset($data['country'])) {
                    $data['country'] = $country_index['label'];
                    $data['country_code'] = $country_index['value'];
                }

                if(!isset($data['flag'])) {
                    $data['flag'] = get_field('country_flag', 'option');
                }

                if(get_field('default_country', 'option')) {
                    $data['intro'] = get_field('language_modal', 'option');
                    $data['default_url'] = $site_domain.$site->path;
                    $data['default_blog_id'] = $site->blog_id;
                }

                array_push ( $data['sites'], ['lang' => get_field('language', 'option'), 'url' => $site_domain.$site->path, 'blog_id' => $site->blog_id] );
            }

            restore_current_blog();
        }

        return $data;
    }

    public function GdprContent() {
        return (isset($_COOKIE['acceptGDPR']))? null : get_field('gdpr_content', 'option');
    }
}
