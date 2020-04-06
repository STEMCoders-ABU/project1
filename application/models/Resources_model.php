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
}