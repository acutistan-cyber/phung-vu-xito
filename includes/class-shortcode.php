<?php

namespace Phung_Vu_Xito;

class Shortcode {
    public function __construct() {
        add_shortcode('phung_vu_calendar', array($this, 'render_calendar'));
    }

    /**
     * Render calendar shortcode
     * 
     * @param array $atts Shortcode attributes
     * @return string HTML output
     */
    public function render_calendar($atts) {
        $atts = shortcode_atts(
            array(
                'month' => date('n'),
                'year' => date('Y'),
                'view' => 'month'
            ),
            $atts,
            'phung_vu_calendar'
        );

        $calendar = new Liturgical_Calendar();
        $month_data = $calendar->get_month_calendar((int)$atts['month'], (int)$atts['year']);
        $colors = $calendar->get_colors();

        // Start output buffering
        ob_start();
        ?>
        <div class="phung-vu-calendar-wrapper">
            <link rel="stylesheet" href="<?php echo PHUNG_VU_XITO_URL; ?>assets/css/calendar.css">
            
            <div class="calendar-header">
                <h2><?php echo sprintf('Lịch Phụng Vụ - %d/%d', $atts['month'], $atts['year']); ?></h2>
            </div>

            <div class="calendar-legend">
                <h3>Chú thích màu sắc:</h3>
                <ul>
                    <?php foreach ($colors as $color_key => $color_info) : ?>
                        <li>
                            <span class="color-box" style="background-color: <?php echo $color_info['hex']; ?>"></span>
                            <strong><?php echo $color_info['name']; ?>:</strong> <?php echo $color_info['meaning']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <table class="calendar-table">
                <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Mùa Phụng Vụ</th>
                        <th>Thánh / Ngày Lễ</th>
                        <th>Màu Phụng Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($month_data)) : ?>
                        <?php foreach ($month_data as $entry) : ?>
                            <tr>
                                <td><?php echo $entry['day']; ?></td>
                                <td><?php echo $entry['season']; ?></td>
                                <td>
                                    <strong><?php echo $entry['name']; ?></strong>
                                    <?php if (!empty($entry['saint'])) : ?>
                                        <br/><small><?php echo $entry['saint']; ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="color-badge" style="background-color: <?php echo $colors[$entry['color']]['hex'] ?? '#CCCCCC'; ?>">
                                        <?php echo $colors[$entry['color']]['name'] ?? ''; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 20px;">
                                Không có dữ liệu cho tháng này
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php
        return ob_get_clean();
    }
}
