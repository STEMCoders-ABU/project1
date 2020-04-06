<?php
class Resources_model extends CI_Model
{
    function get_frequenty_accessed_resources()
    {
        $query = $this->db->select('resources.id, resources.title AS resource_title, resource_categories.category AS resource_category, '
            . 'levels.level AS resource_level, faculties.faculty AS resource_faculty, departments.department AS resource_department, '
            . 'courses.course_code AS resource_course')
            ->from('resources')
            ->join('resource_categories', 'resource_categories.id = resources.category_id')
            ->join('levels', 'levels.id = resources.level_id')
            ->join('faculties', 'faculties.id = resources.faculty_id')
            ->join('departments', 'departments.id = resources.department_id')
            ->join('courses', 'courses.id = resources.course_id')
            ->order_by('resources.downloads DESC')
            ->limit(10, 0);

        return $query->get()->result_array();
    }

    function get_resource_categories_ids()
    {
        return $this->db->select('id')->from('resource_categories')
            ->get()->result_array();
    }

    function get_resource_catgory_title ($resource_category_id)
    {
        return $this->db->select('category')
            ->get_where('resource_categories', ['id' => $resource_category_id])
            ->row_array()['category'];
    }

    function get_courses_for_category ($resource_category_id, $restrictions)
    {
        $restrictions['resources.category_id'] = $resource_category_id;

        $query = $this->db->select('courses.course_code AS course, courses.id as course_id')
            ->from('resources')
            ->join('courses', 'courses.id = resources.course_id')
            ->where($restrictions);

        return $query->get()->result_array();
    }
}