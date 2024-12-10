<?php
//Enqueue CSS in front and backend

function front_css()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'front_css');

function restore_admin_styles() {
    wp_enqueue_style('admin-css', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'restore_admin_styles');




//Enqueue JS in front and backend
function enqueue_script_js_file()
{

    wp_register_script(
        'theme-script',
        get_template_directory_uri() . '/assets/js/script.js',         array('jquery'),
        '1.0.0',
        true
    );

    // Enqueue the script on the front-end
    if (!is_admin()) {
        wp_enqueue_script('theme-script');
    }

    $arguments = array(
        'ajax_url' => admin_url('admin-ajax.php'), // Correct URL for AJAX
        'nonce' => wp_create_nonce('search_projects_nonce'), // Nonce for security
    );

    wp_localize_script('theme-script', 'search_projects_obj', $arguments);
}

add_action('wp_enqueue_scripts', 'enqueue_script_js_file');

function my_custom_theme_setup()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_custom_theme_setup');


// register custom post type projects


function create_projects_cpt()
{

    $labels = array(
        'name' => __('Projects', 'task_1_td'),
        'singular_name' => __('Project', 'task_1_td'),
        'add_new' => __('Add New Project', 'task_1_td'),
        'add_new_item' => __('Add New Project', 'task_1_td'),
        'edit_item' => __('Edit Project', 'task_1_td'),
        'new_item' => __('New Project', 'task_1_td'),
        'view_item' => __('View Project', 'task_1_td'),
        'search_items' => __('Search Project', 'task_1_td'),
        'exclude_from_search' => true,
        'not_found' => __('No Project found', 'task_1_td'),
        'not_found_in_trash' => __('No Project found in trash', 'task_1_td'),
        'parent_item_colon' => '',
        'all_items' => __('All Projects', 'task_1_td'),
        'menu_name' => __('Projects', 'task_1_td'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
        'rewrite' => array('slug' => 'projects'),
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
    );
    register_post_type('projects', $args);

}

add_action('init', 'create_projects_cpt');

function projects_meta_box()
{
    add_meta_box('project_details', 'Project Details', 'project_fields_callback', 'projects');
}

add_action('add_meta_boxes', 'projects_meta_box');

function project_fields_callback($post)
{
    $start_date = get_post_meta($post->ID, 'start_date', true);
    $end_date = get_post_meta($post->ID, 'end_date', true);
    $project_url = get_post_meta($post->ID, 'project_url', true);
    ?>
        <div class="row">
            <div class="col-12 col-md-8">
                    <label class="label" for="start_date"><strong><?php echo esc_html__('Start Date:','task_1_td'); ?></strong></label>
                    <input type="date" name="start_date" class="form-control" value="<?php echo esc_attr($start_date); ?>">
            </div>
            <div class="col-12 col-md-8 mt-2">
                    <label class="label" for="end_date"><strong><?php echo esc_html__('End Date:','task_1_td'); ?></strong></label>
                    <input type="date" name="end_date" class="form-control" value="<?php echo esc_attr($end_date); ?>">
            </div>
            <div class="col-12 col-md-8 mt-2">
                <label class="label" for="project_url"><strong><?php echo esc_html__('Project Url:','task_1_td'); ?></strong></label>
                <input type="url" name="project_url" class="form-control" value="<?php echo esc_url($project_url); ?>">
            </div>
        </div>
    <?php
}

function save_project_meta($post_id)
{
    if (isset($_POST['start_date'])) {
        update_post_meta($post_id, 'start_date', sanitize_text_field($_POST['start_date']));
    }
    if (isset($_POST['end_date'])) {
        update_post_meta($post_id, 'end_date', sanitize_text_field($_POST['end_date']));
    }
    if (isset($_POST['project_url'])) {
        update_post_meta($post_id, 'project_url', sanitize_url($_POST['project_url']));
    }
}

add_action('save_post_projects', 'save_project_meta');


function my_custom_menus()
{
    register_nav_menus(array(
        'header-menu' => 'Header Menu',
    ));
}

add_action('init', 'my_custom_menus');


//Added Projects archive page in nav menu

function add_projects_archive_menu_item($items, $args) {
    if ($args->theme_location == 'header-menu') { // Replace 'primary' with your menu location

        // Add a custom item for the Projects archive
        $archive_item = new stdClass();
        $archive_item->ID = 0;
         $archive_item->db_id = 0;
        $archive_item->title = 'All Projects';
        $archive_item->url = get_post_type_archive_link('projects');
        $archive_item->menu_order = count($items) + 1;
        $archive_item->post_parent = 0;
        $archive_item->type = 'custom';
        $archive_item->type_label = 'Custom Link';
        $archive_item->object = 'custom';
        $archive_item->classes = array('menu-item', 'menu-item-projects-archive');

        // Add the custom item to the menu
        $items[] = $archive_item;
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'add_projects_archive_menu_item', 10, 2);



//enqueue bootstrap

if (!function_exists('task_1_enqueue_bootstrap_function')):
    function task_1_enqueue_bootstrap_function()
    {
        wp_enqueue_style('bootstrap-5-css', get_stylesheet_directory_uri() . '/assets/vendors/bootstrap-5/css/bootstrap.min.css', false, NULL, 'all');
        wp_enqueue_script('bootstrap-5-js', get_template_directory_uri() . '/assets/vendors/bootstrap-5/js/bootstrap.bundle.min.js', array('jquery'), NULL, true);

    }
endif;
add_action('wp_enqueue_scripts', 'task_1_enqueue_bootstrap_function');
add_action('admin_enqueue_scripts', 'task_1_enqueue_bootstrap_function');


if (!function_exists('task_1_register_nav_menus')):
    function task_1_register_nav_menus()
    {
        register_nav_menu('primary', 'Primary Menu');
    }
endif;
add_action('after_setup_theme', 'task_1_register_nav_menus');


//REST API to Fetch posts of post_type projects


function projects_api_endpoint()
{
    register_rest_route('custom/v1', '/projects', array(
        'methods' => 'GET',
        'callback' => 'get_projects_data',
    ));
}

add_action('rest_api_init', 'projects_api_endpoint');

function get_projects_data($request)
{
    $page = $request->get_param('page') ?: 1;
    $projects = get_posts(
        array(
            'post_type' => 'projects',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'paged' => $page
        ));
    $data = array();

    foreach ($projects as $project) {
        $data[] = array(
            'title' => $project->post_title,
            'url' => get_post_meta($project->ID, 'project_url', true),
            'start_date' => get_post_meta($project->ID, 'start_date', true),
            'end_date' => get_post_meta($project->ID, 'end_date', true),
        );
    }
    if (empty($data)) {
        return new WP_Error('no_projects', 'No projects found', array('status' => 404));
    }

    return rest_ensure_response($data);
}



//AJAX Call Back to filter Projects based on dates

add_action('wp_ajax_search_projects', 'search_projects_callback');
add_action('wp_ajax_nopriv_search_projects', 'search_projects_callback');

function search_projects_callback() {

    $nonce=isset($_POST['nonce']) ? sanitize_text_field(wp_unslash($_POST['nonce'])) : '';

    // Verify Nonce
    if (isset($_POST['nonce']) && !wp_verify_nonce($nonce,'search_projects_nonce')) {
        wp_send_json_error('Security Voilated');
    }
// Verify that the required parameters are present
    if (!isset($_POST['start_date']) || !isset($_POST['end_date'])) {
        wp_send_json_error('Missing parameters');
    }

    // Sanitize input
    $start_date = sanitize_text_field($_POST['start_date']);
    $end_date = sanitize_text_field($_POST['end_date']);

    // Query projects with meta_query for date range
    $args = array(
        'post_type' => 'projects',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'start_date',
                'value' => $start_date,
                'compare' => '>=',
                'type' => 'DATE',
            ),
            array(
                'key' => 'end_date',
                'value' => $end_date,
                'compare' => '<=',
                'type' => 'DATE',
            ),
        ),
    );

    $query = new WP_Query($args);
    $projects = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $projects[] = array(
                'title' => get_the_title(),
                'post_url' => get_permalink(),
                'project_url' => get_post_meta(get_the_ID(), 'project_url', true),
                'start_date' => get_post_meta(get_the_ID(), 'start_date', true),
                'end_date' => get_post_meta(get_the_ID(), 'end_date', true),
            );
        }
    }

    wp_reset_postdata();

    // Return projects as JSON
    wp_send_json_success($projects);
}










class Bootstrap_Nav_Walker extends Walker_Nav_Menu
{
    // Start Level
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $submenu_class = ($depth > 0) ? 'dropdown-menu dropdown-submenu' : 'dropdown-menu';
        $output .= "\n$indent<ul class=\"" . esc_attr($submenu_class) . "\">\n";
    }

    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($depth > 0 && $args->walker->has_children) ? 'dropdown-submenu' : '';
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = ($args->walker->has_children) ? 'nav-link dropdown-toggle' : 'nav-link';

        if ($args->walker->has_children) {
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-expanded'] = 'false';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;

            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }

    // End Level
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}




function show_admin_bar_for_logged_in_users()
{
    if (is_user_logged_in()) {
        show_admin_bar(true);
    } else {
        show_admin_bar(false);
    }
}

add_action('after_setup_theme', 'show_admin_bar_for_logged_in_users');


?>