<?php
class Resources extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('resources_model');
    }

    public function index()
    {
        $data['page_title'] = 'Resources';
        $data['resources'] = $this->resources_model->get_frequenty_accessed_resources();
        load_view('resources/index', $data);
    }

    public function resource ($faculty_id = 0, $department_id = 0, $level_id = 0, $category_id = 0, $course_id = 0, $items_offset = 0)
    {
        $data['page_title'] = 'Resources';

        if ($faculty_id == 0 && $department_id == 0 && $level_id == 0)
            redirect('resources');

        $resource_categories_ids = $this->resources_model->get_resource_categories_ids();
        $sidebar_contents = [];

        $restrictions = 
        [
            'resources.faculty_id' => $faculty_id,
            'resources.department_id' => $department_id,
            'resources.level_id' => $level_id,
        ];

        $first_category_with_resources_id = NULL;
        $first_course_id = NULL;

        foreach ($resource_categories_ids as $resource_category_id)
        {
            $group['category_id'] = $resource_category_id['id'];
            $group['header'] = $this->resources_model->get_resource_catgory_title($resource_category_id['id']) . 's';
            $group['contents'] = $this->resources_model->get_courses_for_category($resource_category_id['id'], $restrictions);
            $sidebar_contents[] = $group;

            if ($first_category_with_resources_id == NULL && $group['contents'])
            {
                $first_category_with_resources_id = $group['category_id'];
                $first_course_id = $group['contents'][array_key_first($group['contents'])]['course_id'];
            }
        }

        if ($category_id == 0)
            $category_id = $first_category_with_resources_id;

        if ($course_id == 0)
            $course_id = $first_course_id;

        $course_code = $this->resources_model->get_course_code($course_id);
        if (! $course_code)
        {
            $data['error'] = TRUE;
            load_view('resources/resources', $data);
        }

        $category = $this->resources_model->get_resource_catgory_title($category_id);
        if (! $category)
        {
            $data['error'] = TRUE;
            load_view('resources/resources', $data);
        }

        $restrictions['resources.course_id'] = $course_id;
        $restrictions['resources.category_id'] = $category_id;

        $comments_restrictions = 
        [
            'department_id' => $department_id,
            'level_id' => $level_id,
            'category_id' => $category_id,
            'course_id' => $course_id,
        ];

        $frequently_accessed = $this->resources_model->get_restricted_frequenty_accessed_resources($restrictions);

        $items_per_page = 10;
        $total_items = count($this->resources_model->get_resources($restrictions));

        $this->load->library('pagination');

        $pagination_config = get_pagination_config(base_url('resources/resource/' . $faculty_id . '/' . $department_id 
            . '/' . $level_id . '/' . $category_id . '/' . $course_id), $total_items, $items_per_page);
        
        $this->pagination->initialize($pagination_config);

        $data['faculty_id'] = $faculty_id;
        $data['department_id'] = $department_id;
        $data['level_id'] = $level_id;
        $data['category_id'] = $category_id;
        $data['course_id'] = $course_id;
        $data['sidebar_contents'] = $sidebar_contents;
        $data['course_code'] = $course_code;
        $data['category'] = $category;
        $data['resources'] = $this->resources_model->get_limited_resources($items_per_page, $items_offset, $restrictions);
        $data['freq_resources'] = $frequently_accessed;
        $data['pagination'] = $this->pagination->create_links();
        $data['category_comments'] = $this->resources_model->get_category_comments($comments_restrictions);

        load_view('resources/resources', $data);
    }

    function add_category_comment()
    {
        $department_id = get_post('department_id');
        $level_id = get_post('level_id');
        $category_id = get_post('category_id');
        $course_id = get_post('course_id');
        $author = get_post('author');
        $comment = get_post('comment');

        $entries = 
        [
            'category_id' => $category_id,
            'course_id' => $course_id,
            'department_id' => $department_id,
            'level_id' => $level_id,
            'author' => $author,
            'comment' => $comment,
        ];

        $id = $this->resources_model->add_category_comment($entries);

        $comment_data = $this->resources_model->get_category_comment($id);
        echo generate_comment_markup($comment_data);
    }

    function view ($resource_id)
    {
        $data['page_title'] = 'Resources';

        $comments_restrictions = 
        [
            'resource_id' => $resource_id,
        ];

        $data['resource'] = $this->resources_model->get_resource($resource_id);
        $data['comments'] = $this->resources_model->get_resource_comments($comments_restrictions);

        load_view('resources/view', $data);
    }

    public function search ($faculty_id = 0, $department_id = 0, $level_id = 0, $category_id = 0, $course_id = 0,
        $keyword = '', $items_offset = 0)
    {
        $data['page_title'] = 'Resources';

        if ($faculty_id == 0 && $department_id == 0 && $level_id == 0)
            redirect('resources');

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $keyword = get_post('keyword');
            $category_id = get_post('category');
        }

        $restrictions = 
        [
            'resources.faculty_id' => $faculty_id,
            'resources.department_id' => $department_id,
            'resources.level_id' => $level_id,
            'resources.course_id' => $course_id,
            'resources.category_id' => $category_id,
        ];

        $course_code = $this->resources_model->get_course_code($course_id);
        if (! $course_code)
        {
            $data['error'] = TRUE;
            load_view('resources/search', $data);
        }

        $category = $this->resources_model->get_resource_catgory_title($category_id);
        if (! $category)
        {
            $data['error'] = TRUE;
            load_view('resources/search', $data);
        }

        $items_per_page = 10;
        $total_items = count($this->resources_model->get_searched_resources($keyword, $restrictions));

        $this->load->library('pagination');

        $pagination_config = get_pagination_config(base_url('resources/search/' . $faculty_id . '/' . $department_id 
            . '/' . $level_id . '/' . $category_id . '/' . $course_id . '/' . $keyword), $total_items, $items_per_page);
        
        $this->pagination->initialize($pagination_config);

        $data['faculty_id'] = $faculty_id;
        $data['department_id'] = $department_id;
        $data['level_id'] = $level_id;
        $data['category_id'] = $category_id;
        $data['course_id'] = $course_id;
        $data['course_code'] = $course_code;
        $data['category'] = $category;
        $data['resources'] = $this->resources_model->get_limited_searched_resources($keyword, $items_per_page, $items_offset, $restrictions);
        $data['pagination'] = $this->pagination->create_links();
        
        load_view('resources/search', $data);
    }

    function add_resource_comment()
    {
        $resource_id = get_post('resource_id');
        $author = get_post('author');
        $comment = get_post('comment');
        
        $entries = 
        [
            'resource_id' => $resource_id,
            'author' => $author,
            'comment' => $comment,
        ];

        $id = $this->resources_model->add_resource_comment($entries);

        $comment_data = $this->resources_model->get_resource_comment($id);
        echo generate_comment_markup($comment_data);
    }
}