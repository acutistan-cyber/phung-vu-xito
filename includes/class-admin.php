<?php

namespace Phung_Vu_Xito;

class Admin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
    }

    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_menu_page(
            'Lịch Phụng Vụ',
            'Lịch Phụng Vụ',
            'manage_options',
            'phung-vu-calendar',
            array($this, 'render_admin_page'),
            'dashicons-calendar-alt'
        );
    }

    /**
     * Render admin page
     */
    public function render_admin_page() {
        $calendar = new Liturgical_Calendar();
        $all_data = $calendar->get_all_calendar_data();
        ?>
        <div class="wrap">
            <h1>Lịch Vạn Niên Công Giáo</h1>
            
            <div class="phung-vu-admin-info">
                <h2>Thông tin Plugin</h2>
                <p>
                    <strong>Phiên bản:</strong> <?php echo PHUNG_VU_XITO_VERSION; ?>
                </p>
                <p>
                    <strong>Tổng số ngày được ghi chép:</strong> <?php echo count($all_data); ?>
                </p>
                <p>
                    <strong>Phạm vi năm:</strong> 2022 - 2100
                </p>
            </div>

            <div class="phung-vu-admin-instructions">
                <h2>Hướng dẫn sử dụng</h2>
                <p>Sử dụng shortcode sau để hiển thị lịch phụng vụ trên các trang:</p>
                <code>[phung_vu_calendar month="1" year="2025"]</code>
                <p><strong>Tham số:</strong></p>
                <ul>
                    <li><code>month</code> - Tháng (1-12), mặc định là tháng hiện tại</li>
                    <li><code>year</code> - Năm (2022-2100), mặc định là năm hiện tại</li>
                </ul>
            </div>
        </div>
        <?php
    }
}
