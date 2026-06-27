<?php

namespace Phung_Vu_Xito;

class Liturgical_Calendar {
    private $calendar_data = array();
    private $data_file;

    public function __construct() {
        $this->data_file = PHUNG_VU_XITO_PATH . 'data/calendar-data.json';
        $this->load_calendar_data();
    }

    /**
     * Load calendar data from JSON file
     */
    private function load_calendar_data() {
        if (file_exists($this->data_file)) {
            $json_content = file_get_contents($this->data_file);
            $this->calendar_data = json_decode($json_content, true);
        }
    }

    /**
     * Get liturgical date information
     * 
     * @param int $day Day of month
     * @param int $month Month number (1-12)
     * @param int $year Year
     * @return array Liturgical information
     */
    public function get_liturgical_date($day, $month, $year) {
        if (empty($this->calendar_data)) {
            return array();
        }

        $date_key = sprintf('%04d-%02d-%02d', $year, $month, $day);

        foreach ($this->calendar_data as $entry) {
            if ($entry['date'] === $date_key) {
                return $entry;
            }
        }

        return array();
    }

    /**
     * Get all dates for a specific month and year
     * 
     * @param int $month Month number (1-12)
     * @param int $year Year
     * @return array List of liturgical entries
     */
    public function get_month_calendar($month, $year) {
        if (empty($this->calendar_data)) {
            return array();
        }

        $month_data = array();
        foreach ($this->calendar_data as $entry) {
            $parts = explode('-', $entry['date']);
            if ((int)$parts[1] === $month && (int)$parts[0] === $year) {
                $month_data[] = $entry;
            }
        }

        return $month_data;
    }

    /**
     * Get calendar data for display
     * 
     * @return array All calendar data
     */
    public function get_all_calendar_data() {
        return $this->calendar_data;
    }

    /**
     * Get liturgical color information
     * 
     * @return array Color information
     */
    public function get_colors() {
        return array(
            'white' => array(
                'name' => 'Trắng',
                'meaning' => 'Lễ các Thánh, Giáng Sinh, Phục sinh',
                'hex' => '#FFFFFF'
            ),
            'red' => array(
                'name' => 'Đỏ',
                'meaning' => 'Các Thánh Tử Đạo, Pentecost',
                'hex' => '#FF0000'
            ),
            'green' => array(
                'name' => 'Xanh Lục',
                'meaning' => 'Thời Kỳ Thường Niên',
                'hex' => '#00AA00'
            ),
            'purple' => array(
                'name' => 'Tím',
                'meaning' => 'Mùa Vọng, Tứ旬',
                'hex' => '#800080'
            ),
            'rose' => array(
                'name' => 'Hồng',
                'meaning' => 'Gaudete Sunday, Laetare Sunday',
                'hex' => '#FF69B4'
            )
        );
    }
}
